<?php

namespace App\Controller;

use App\Entity\EcoOrgTax;
use App\Entity\vEcoOrgTax;
use App\Entity\User;
use App\Entity\EcoCounters;
use App\Entity\EcoRevision;
use App\Services\SSPCallerOperation;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;
use ZipArchive;

class ApiController extends AbstractController
{
    protected $ssp;
    private $passwordEncoder;

    private $token = "";
    private $secret = "";

    public function __construct(SSPCallerOperation $ssp, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->ssp = $ssp;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/api/login", methods={"POST"}, name="api_login")
     * @param Request $request
     */
    public function login(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */
        $em = $this->ssp->getContainer()->get('doctrine')->getManager();

        $user = $em->getRepository(User::class)->findOneBy(['username' => $data['login']]);

        if ($user) {

            $password = $this->passwordEncoder->isPasswordValid($user, $data['password']);

            if ($password) {

            $name = explode(" ", $user->getEcoUser()->GetFio());

            return $this->json([
                'name' => $name[1],
                'second_name' => $name[0],
                'token' => $user->getSalt(),
            ]);
            }
        }

        return new JsonResponse([
            'error' => 'Неверный логин или пароль'
        ], 405);
    }

    /**
     * @Route("/api/me", name="api_check_token")
     * @param Request $request
     */
    public function check_token(Request $request)
    {
        $header = $request->headers->get('Authorization');

        $data = json_decode($request->getContent(), true);

        if (!empty($header)) {

            /** @var EntityManager $em */
            $em = $this->ssp->getContainer()->get('doctrine')->getManager();

            $user = $em->getRepository(User::class)->findOneBy(
                ['salt' => (int) filter_var($header, FILTER_SANITIZE_NUMBER_INT)]);

            if ($user) {

                $name = explode(" ", $user->getEcoUser()->GetFio());

                return $this->json([
                    'id' => $user->getId(),
                    'name' => $name[1],
                    'second_name' => $name[0],
                ]);

            }
        }

        return new JsonResponse([
            'error' => 'Невалидный токен'
        ], 401);

    }

    /**
     * @Route("/api/load_companies_tax", name="api_load_companies_tax")
     * @param Request $request
     */
    public function load_companies_tax(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $dadata = new \Dadata\DadataClient($this->token, null);

        /** @var EntityManager $em */

        $em = $this->getDoctrine()->getManager();

        $companies = $em->getRepository(EcoOrgTax::class)
            ->findBy(
                array(),
                array('geoLat' => 'DESC'),    // $orderBy
                10000,                        // $limit
                0                             // $offset
            );

        foreach ($companies as $company_tax)
        {
            if ((trim($company_tax->getinn()) <> '') and ($company_tax->getgeoLat() == '')) {

                $result = $dadata->findById("party", $company_tax->getinn(), 1);

                if (isset($result[0]["data"])) {

                    $data = $result[0]["data"];

                    $company_tax->setOkved($data["okved"]);

                    if (isset($data["okveds"])) {
                        $str_okved = '';
                        foreach ($data["okveds"] as $okved) {
                            $str_okved = $str_okved . $okved["code"] . ',';
                        }
                        if ($str_okved <> '') {
                            $company_tax->setokveds($str_okved);
                        }
                    }

                    if (isset($data["address"]["data"])) {
                        $company_tax->setadressLoad($data["address"]["unrestricted_value"]);
                    }

                    if (isset($data["address"]["data"])) {

                        $address = $data["address"]["data"];

                        $company_tax->setgeoLat($address["geo_lat"]);
                        $company_tax->setgeoLon($address["geo_lon"]);
                    }

                    $em->persist($company_tax);
                    $em->flush();

                }
            }
        }

        return $this->json([
            'status' => 'ok',
        ]);
    }

     /**
     * @Route("/api/load_counters", name="api_load_counters")
     * @param Request $request
     */
    public function load_counters(Request $request)
    {
        $header = $request->headers->get('Authorization');

        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */

        $em = $this->getDoctrine()->getManager();

        $counters = $em->getRepository(EcoCounters::class)->findAll();

        if ($counters) {

            $dadata = new \Dadata\DadataClient($this->token, $this->secret);

            foreach ($counters as $counter)
            {
              if (($counter->getCounterGeolat() == '') && ($counter->getCounterGeolon() == '')) {

                  $result = $dadata->clean("address", $counter->getCounterAddress());

                  $counter->SetCounterGeolat($result["geo_lat"]);

                  $counter->SetCounterGeoLon($result["geo_lon"]);

                  $em->persist($counter);

                  $em->flush();
              }
            }

             return $this->json([
                    'status' => 'ok',
             ]);

        }

        return new JsonResponse([
            'error' => 'Счетчики не найдены'
        ], 401);

    }

    /**
     * @Route("/api/meters", name="api_get_counters")
     * @Route("/api/meters/{id}", name="api_get_counters")
     * @param Request $request
     */
    public function get_counters(Request $request, $id = null)
    {
        $header = $request->headers->get('Authorization');
        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        if ($id) {
            $query = $em->createQuery(
                'SELECT c
               FROM App\Entity\EcoCounters c
                  WHERE c.idCounter = :id
               ')->setParameter('id', $id);
        }
        else {
            $query = $em->createQuery(
                'SELECT c
                   FROM App\Entity\EcoCounters c
               '
            );
        }

        $counters = $query->getArrayResult();

        if ($counters) {

            $types = array(
                1 => 'sensor_fixed_federal',
                2 => 'sensor_fixed_local',
                3 => 'sensor_mobile_local');

            foreach ($counters as $counter) {

                $data[] = array(
                    "id" => $counter['idCounter'],
                    "address" => $counter['CounterAddress'],
                    "name" => $counter['CounterName'],
                    "type" => $types[$counter['CounterType']],
                    "lat" => floatval($counter['CounterGeoLat']),
                    "lng" => floatval($counter['CounterGeoLon']),
                    );
            }

            if ($id) {
                $response = new JsonResponse($data[0]);
            }
            else {
                $response = new JsonResponse($data);
            }

            $response -> setEncodingOptions(JSON_UNESCAPED_UNICODE);

            return $response;

        }

        return new JsonResponse([
            'error' => 'Счетчики не найдены'
        ], 404);

    }

    /**
     * @Route("/api/factories", name="api_get_factories")
     * @Route("/api/factories/{id}", name="api_get_factories")
     * @param Request $request
     */
    public function get_factories(Request $request, $id = null)
    {
        $header = $request->headers->get('Authorization');
        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        if ($id) {
            $query = $em->createQuery(
                'SELECT c 
                   FROM App\Entity\EcoOrgTax c
                  WHERE c.idEcoOrg = :id
               ')->setParameter('id', $id);
        }
        else {
            $query = $em->createQuery(
                'SELECT t 
                   FROM App\Entity\vEcoOrgTax t                 
               ')->setMaxResults(1500);
        }

        $companies = $query->getArrayResult();
        if ($companies) {

            foreach ($companies as $comp) {

                unset($reason);

                if ($comp['chOkved']==1) {
                    $reason[] = 'okved';
                }
                if ($comp['chLicOth']==1) {
                    $reason[] = 'emissions';
                }
                if ($comp['chLicVibros']==1) {
                    $reason[] = 'waste';
                }
                if ($comp['chLicMet']==1) {
                    $reason[] = 'metal';
                }

                $data[] = array(
                    "id" => $comp['idEcoOrg'],
                    "address" => $comp['adressLoad'],
                    "name" => $comp['nameOrg'],
                    "lat" => floatval($comp['geoLat']),
                    "lng" => floatval($comp['geoLon']),
                    "management_name" => $comp['fam'] . " " . $comp['im'] . " " . $comp['ot'],
                    "inn" => $comp['inn'],
                    "okpo" => $comp['okpo'],
                    "okved" => $comp['okved'],
                    "okved_display" => $comp['okved'],
                    "phones" => $comp['tel'],
                    "emails" => $comp['email'],
                    "is_registered" => boolval($comp['chNvos']),
                    "reason_searching" => (isset($reason) ? $reason : ""),
                );
            }

            if ($id) {
                $response = new JsonResponse($data[0]);
            }
            else {
                $response = new JsonResponse($data);
            }

            $response -> setEncodingOptions(JSON_UNESCAPED_UNICODE);

            return $response;
        }

        return new JsonResponse([
            'error' => 'Огранизации не найдены'
        ], 401);

    }

    /**
     * @Route("/api/factories-map", name="api_get_factories_map")
     * @param Request $request
     */
    public function get_factories_map(Request $request)
    {
        $header = $request->headers->get('Authorization');
        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
                'SELECT t 
                   FROM App\Entity\vEcoOrgTax t
               ')->setMaxResults(1500);

        $companies = $query->getArrayResult();

        if ($companies) {

            foreach ($companies as $comp) {

                unset($reason);

                if ($comp['chOkved']==1) {
                    $reason[] = 'okved';
                }
                if ($comp['chLicOth']==1) {
                    $reason[] = 'emissions';
                }
                if ($comp['chLicVibros']==1) {
                    $reason[] = 'waste';
                }
                if ($comp['chLicMet']==1) {
                    $reason[] = 'metal';
                }

                $data[] = array(
                    "id" => (int)($comp['idEcoOrg']),
                    "lat" => floatval($comp['geoLat']),
                    "lng" => floatval($comp['geoLon']),
                    "is_registered" => boolval($comp['chNvos']),
                    "reason_searching" => (isset($reason) ? $reason : array()),
                );
            }

            $response = new JsonResponse($data);

            $response -> setEncodingOptions(JSON_UNESCAPED_UNICODE);

            return $response;
        }

        return new JsonResponse([
            'error' => 'Огранизации не найдены'
        ], 401);

    }

    /**
     * @Route("/api/factories-coords", name="api_get_factories_coords")
     * @param Request $request
     */
    public function get_factories_coords(Request $request)
    {
        $header = $request->headers->get('Authorization');
        $data = json_decode($request->getContent(), true);

        $latStart = $request->query->get("lat_start");
        $latEnd   = $request->query->get("lat_end");
        $lngStart = $request->query->get("lng_start");
        $lngEnd =   $request->query->get("lng_end");

        if (($latStart<>'') and ($latEnd<>'') and ($lngStart <>'') and ($lngEnd <>''))
        {
            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getManager();

            $query = $em->createQuery(
             'SELECT t 
              FROM App\Entity\vEcoOrgTax t
             WHERE t.geoLat between ' . $latStart . ' and ' . $latEnd . ' 
               and t.geoLon between ' . $lngStart . ' and ' . $lngEnd . '
             ORDER BY t.chNvos desc'
            )->setMaxResults(1500);

            $companies = $query->getArrayResult();

            if ($companies) {

                foreach ($companies as $comp) {

                    unset($reason);

                    if ($comp['chOkved']==1) {
                        $reason[] = 'okved';
                    }
                    if ($comp['chLicOth']==1) {
                        $reason[] = 'emissions';
                    }
                    if ($comp['chLicVibros']==1) {
                        $reason[] = 'waste';
                    }
                    if ($comp['chLicMet']==1) {
                        $reason[] = 'metal';
                    }

                    $data[] = array(
                        "id" => $comp['idEcoOrg'],
                        "address" => $comp['adressLoad'],
                        "name" => $comp['nameOrg'],
                        "lat" => floatval($comp['geoLat']),
                        "lng" => floatval($comp['geoLon']),
                        "management_name" => $comp['fam'] . " " . $comp['im'] . " " . $comp['ot'],
                        "inn" => $comp['inn'],
                        "okpo" => $comp['okpo'],
                        "okved" => $comp['okved'],
                        "okved_display" => $comp['okved'],
                        "phones" => $comp['tel'],
                        "emails" => $comp['email'],
                        "is_registered" => boolval($comp['chNvos']),
                        "reason_searching" => (isset($reason) ? $reason : "")
                    );
                }

                $response = new JsonResponse($data);

                $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);

                return $response;
            } else {

                return new JsonResponse([
                    'error' => 'Огранизации не найдены'
                ], 401);
            }

        } else {
        return new JsonResponse([
            'error' => 'Координаты не определены'
        ], 401);
    }

    }

    /**
     * @Route("/api/map-objects", name="api_get_map_objects")
     * @param Request $request
     */
    public function get_map_objects(Request $request)
    {
        $header = $request->headers->get('Authorization');
        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT t.idEcoOrg as idTax, t.geoLat, t.geoLon 
               FROM App\Entity\vEcoOrgTax t
               ')
            ->setMaxResults(1500);

        $companies = $query->getArrayResult();

        if ($companies) {
            foreach ($companies as $comp) {
                $data[] = array(
                    "id" => '1'.$comp['idTax'],
                    "real_id" => $comp['idTax'],
                    "type" => 'factory',
                    "display_type" => 'success',
                    "lat" => floatval($comp['geoLat']),
                    "lng" => floatval($comp['geoLon'])
                );
            }
        }

        $query = $em->createQuery(
            'SELECT c
               FROM App\Entity\EcoCounters c
               ');
        $counters = $query->getArrayResult();

        if ($counters) {

            $types = array(
                1 => 'sensor_fixed_federal',
                2 => 'sensor_fixed_local',
                3 => 'sensor_mobile_local');

            foreach ($counters as $counter) {
                $data[] = array(
                    "id" => '2'.$counter['idCounter'],
                    "real_id" => $counter['idCounter'],
                    "type" => $types[$counter['CounterType']],
                    "display_type" => 'success',
                    "lat" => floatval($counter['CounterGeoLat']),
                    "lng" => floatval($counter['CounterGeoLon']),
                );
            }
        }

        if ($data) {

            $response = new JsonResponse($data);
            $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            return $response;
        }

        return new JsonResponse([
            'error' => 'Невалидный токен'
        ], 401);
    }

    /**
     * @Route("/api/note-factory/{factory_id}", name="api_get_note_factory")
     * @param Request $request
     */
    public function get_note_factory(Request $request, $factory_id = null)
    {
        $header = $request->headers->get('Authorization');
        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        if ($factory_id) {
            $query = $em->createQuery(
                'SELECT r 
                   FROM App\Entity\EcoRevision r
                  WHERE r.idOrgTax = :id
               ')->setParameter('id', $factory_id);
        }

        $notes = $query->getArrayResult();

        if ($notes) {

            foreach ($notes as $note) {

                $data[] = array(
                    "id" => $note['idRevision'],
                    "factory_id" => $note['idOrgTax'],
                    "create_at" => $note["dateProv"]->getTimestamp(),
                    "comment" => $note['commet'],
                );

            }

            $response = new JsonResponse($data);

            $response -> setEncodingOptions(JSON_UNESCAPED_UNICODE);

            return $response;
        }

        return new JsonResponse([
            'error' => 'Заметки не найдены'
        ], 401);

    }

    /**
     * @Route("/api/note/{id}", name="api_get_note_id")
     * @param Request $request
     */
    public function get_note_id(Request $request, $id = null)
    {
        $header = $request->headers->get('Authorization');
        $data = json_decode($request->getContent(), true);

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        if ($id) {

            $query = $em->createQuery(
                'SELECT r 
                   FROM App\Entity\EcoRevision r
                  WHERE r.idRevision = :id
               ')->setParameter('id', $id);
        }

        $notes = $query->getArrayResult();

        if ($notes) {

            foreach ($notes as $note) {

                $data[] = array(
                    "id" => $note['idRevision'],
                    "factory_id" => $note['idOrgTax'],
                    "create_at" => $note["dateProv"]->getTimestamp(),
                    "comment" => $note['commet'],
                );

            }

            $response = new JsonResponse($data);

            $response -> setEncodingOptions(JSON_UNESCAPED_UNICODE);

            return $response;
        }

        return new JsonResponse([
            'error' => 'Заметки не найдены'
        ], 401);

    }

}