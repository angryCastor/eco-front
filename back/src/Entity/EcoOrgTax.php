<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoOrgTax
 *
 * @ORM\Table(name="eco_org_tax", uniqueConstraints={@ORM\UniqueConstraint(name="eco_org_id_eco_org_uindex", columns={"id_eco_org"})})
 * @ORM\Entity
 */
class EcoOrgTax
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_eco_org", type="decimal", precision=38, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_org_tax_id_eco_org_seq", allocationSize=1, initialValue=1)
     */
    private $idEcoOrg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_org", type="string", length=250, nullable=true)
     */
    private $nameOrg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="inn", type="string", length=250, nullable=true)
     */
    private $inn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kpp", type="string", length=250, nullable=true)
     */
    private $kpp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress", type="string", length=250, nullable=true)
     */
    private $adress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fam", type="string", length=250, nullable=true)
     */
    private $fam;

    /**
     * @var string|null
     *
     * @ORM\Column(name="im", type="string", length=250, nullable=true)
     */
    private $im;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ot", type="string", length=250, nullable=true)
     */
    private $ot;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vid", type="string", length=250, nullable=true)
     */
    private $vid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel", type="string", length=250, nullable=true)
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="viruch", type="string", length=250, nullable=true)
     */
    private $viruch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="string", length=250, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_edo", type="string", length=250, nullable=true)
     */
    private $idEdo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okpo", type="string", length=25, nullable=true)
     */
    private $okpo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reg", type="string", length=25, nullable=true)
     */
    private $reg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kod", type="string", length=25, nullable=true)
     */
    private $kod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="site", type="string", length=250, nullable=true)
     */
    private $site;

    /**
     * @var string|null
     *
     * @ORM\Column(name="egaic", type="string", length=25, nullable=true)
     */
    private $egaic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gln", type="string", length=25, nullable=true)
     */
    private $gln;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okved", type="string", nullable=true)
     */
    private $okved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okveds", type="string", nullable=true)
     */
    private $okveds;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geo_lat", type="string", nullable=true)
     */
    private $geoLat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geo_lon", type="string", nullable=true)
     */
    private $geoLon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ch_okved", type="integer", nullable=true)
     */
    private $chOkved;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ch_lic_oth", type="integer", nullable=true)
     */
    private $chLicOth;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ch_lic_vibros", type="integer", nullable=true)
     */
    private $chLicVibros;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ch_lic_met", type="integer", nullable=true)
     */
    private $chLicMet;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ch_nvos", type="integer", nullable=true)
     */
    private $chNvos;


    /**
     * @var string|null
     *
     * @ORM\Column(name="adress_load", type="string", length=250, nullable=true)
     */
    private $adressLoad;

    /**
     * @return string
     */
    public function getIdEcoOrg(): string
    {
        return $this->idEcoOrg;
    }

    /**
     * @param string $idEcoOrg
     */
    public function setIdEcoOrg(string $idEcoOrg): void
    {
        $this->idEcoOrg = $idEcoOrg;
    }

    /**
     * @return string|null
     */
    public function getNameOrg(): ?string
    {
        return $this->nameOrg;
    }

    /**
     * @param string|null $nameOrg
     */
    public function setNameOrg(?string $nameOrg): void
    {
        $this->nameOrg = $nameOrg;
    }

    /**
     * @return string|null
     */
    public function getInn(): ?string
    {
        return $this->inn;
    }

    /**
     * @param string|null $inn
     */
    public function setInn(?string $inn): void
    {
        $this->inn = $inn;
    }

    /**
     * @return string|null
     */
    public function getKpp(): ?string
    {
        return $this->kpp;
    }

    /**
     * @param string|null $kpp
     */
    public function setKpp(?string $kpp): void
    {
        $this->kpp = $kpp;
    }

    /**
     * @return string|null
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * @param string|null $adress
     */
    public function setAdress(?string $adress): void
    {
        $this->adress = $adress;
    }

    /**
     * @return string|null
     */
    public function getFam(): ?string
    {
        return $this->fam;
    }

    /**
     * @param string|null $fam
     */
    public function setFam(?string $fam): void
    {
        $this->fam = $fam;
    }

    /**
     * @return string|null
     */
    public function getIm(): ?string
    {
        return $this->im;
    }

    /**
     * @param string|null $im
     */
    public function setIm(?string $im): void
    {
        $this->im = $im;
    }

    /**
     * @return string|null
     */
    public function getOt(): ?string
    {
        return $this->ot;
    }

    /**
     * @param string|null $ot
     */
    public function setOt(?string $ot): void
    {
        $this->ot = $ot;
    }

    /**
     * @return string|null
     */
    public function getVid(): ?string
    {
        return $this->vid;
    }

    /**
     * @param string|null $vid
     */
    public function setVid(?string $vid): void
    {
        $this->vid = $vid;
    }

    /**
     * @return string|null
     */
    public function getTel(): ?string
    {
        return $this->tel;
    }

    /**
     * @param string|null $tel
     */
    public function setTel(?string $tel): void
    {
        $this->tel = $tel;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getViruch(): ?string
    {
        return $this->viruch;
    }

    /**
     * @param string|null $viruch
     */
    public function setViruch(?string $viruch): void
    {
        $this->viruch = $viruch;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param string|null $price
     */
    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getIdEdo(): ?string
    {
        return $this->idEdo;
    }

    /**
     * @param string|null $idEdo
     */
    public function setIdEdo(?string $idEdo): void
    {
        $this->idEdo = $idEdo;
    }

    /**
     * @return string|null
     */
    public function getOkpo(): ?string
    {
        return $this->okpo;
    }

    /**
     * @param string|null $okpo
     */
    public function setOkpo(?string $okpo): void
    {
        $this->okpo = $okpo;
    }

    /**
     * @return string|null
     */
    public function getReg(): ?string
    {
        return $this->reg;
    }

    /**
     * @param string|null $reg
     */
    public function setReg(?string $reg): void
    {
        $this->reg = $reg;
    }

    /**
     * @return string|null
     */
    public function getKod(): ?string
    {
        return $this->kod;
    }

    /**
     * @param string|null $kod
     */
    public function setKod(?string $kod): void
    {
        $this->kod = $kod;
    }

    /**
     * @return string|null
     */
    public function getSite(): ?string
    {
        return $this->site;
    }

    /**
     * @param string|null $site
     */
    public function setSite(?string $site): void
    {
        $this->site = $site;
    }

    /**
     * @return string|null
     */
    public function getEgaic(): ?string
    {
        return $this->egaic;
    }

    /**
     * @param string|null $egaic
     */
    public function setEgaic(?string $egaic): void
    {
        $this->egaic = $egaic;
    }

    /**
     * @return string|null
     */
    public function getGln(): ?string
    {
        return $this->gln;
    }

    /**
     * @param string|null $gln
     */
    public function setGln(?string $gln): void
    {
        $this->gln = $gln;
    }

    /**
     * @return string|null
     */
    public function getOkved(): ?string
    {
        return $this->okved;
    }

    /**
     * @param string|null $okved
     */
    public function setOkved(?string $okved): void
    {
        $this->okved = $okved;
    }

    /**
     * @return string|null
     */
    public function getOkveds(): ?string
    {
        return $this->okveds;
    }

    /**
     * @param string|null $okveds
     */
    public function setOkveds(?string $okveds): void
    {
        $this->okveds = $okveds;
    }

    /**
     * @return string|null
     */
    public function getGeoLat(): ?string
    {
        return $this->geoLat;
    }

    /**
     * @param string|null $geoLat
     */
    public function setGeoLat(?string $geoLat): void
    {
        $this->geoLat = $geoLat;
    }

    /**
     * @return string|null
     */
    public function getGeoLon(): ?string
    {
        return $this->geoLon;
    }

    /**
     * @param string|null $geoLon
     */
    public function setGeoLon(?string $geoLon): void
    {
        $this->geoLon = $geoLon;
    }

    /**
     * @return int|null
     */
    public function getChOkved(): ?int
    {
        return $this->chOkved;
    }

    /**
     * @param int|null $chOkved
     */
    public function setChOkved(?int $chOkved): void
    {
        $this->chOkved = $chOkved;
    }

    /**
     * @return int|null
     */
    public function getChLicOth(): ?int
    {
        return $this->chLicOth;
    }

    /**
     * @param int|null $chLicOth
     */
    public function setChLicOth(?int $chLicOth): void
    {
        $this->chLicOth = $chLicOth;
    }

    /**
     * @return int|null
     */
    public function getChLicVibros(): ?int
    {
        return $this->chLicVibros;
    }

    /**
     * @param int|null $chLicVibros
     */
    public function setChLicVibros(?int $chLicVibros): void
    {
        $this->chLicVibros = $chLicVibros;
    }

    /**
     * @return int|null
     */
    public function getChLicMet(): ?int
    {
        return $this->chLicMet;
    }

    /**
     * @param int|null $chLicMet
     */
    public function setChLicMet(?int $chLicMet): void
    {
        $this->chLicMet = $chLicMet;
    }

    /**
     * @return string|null
     */
    public function getAdressLoad(): ?string
    {
        return $this->adressLoad;
    }

    /**
     * @param string|null $adressLoad
     */
    public function setAdressLoad(?string $adressLoad): void
    {
        $this->adressLoad = $adressLoad;
    }

    /**
     * @return int|null
     */
    public function getChNvos(): ?int
    {
        return $this->chNvos;
    }

    /**
     * @param int|null $chNvos
     */
    public function setChNvos(?int $chNvos): void
    {
        $this->chNvos = $chNvos;
    }

}
