<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoKatOkvedGroup
 *
 * @ORM\Table(name="eco_kat_okved_group", uniqueConstraints={@ORM\UniqueConstraint(name="eco_kat_okved_group_sn_uindex", columns={"id"})})
 * @ORM\Entity
 */
class EcoKatOkvedGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_kat_okved_group_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_kat_okved", type="integer", nullable=false)
     */
    private $idKatOkved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okved", type="string", nullable=true)
     */
    private $okved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okved_name", type="string", nullable=true)
     */
    private $okvedName;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdKatOkved()
    {
        return $this->idKatOkved;
    }

    /**
     * @param int $idKatOkved
     */
    public function setIdKatOkved($idKatOkved)
    {
        $this->idKatOkved = $idKatOkved;
    }

    /**
     * @return string|null
     */
    public function getOkved()
    {
        return $this->okved;
    }

    /**
     * @param string|null $okved
     */
    public function setOkved($okved)
    {
        $this->okved = $okved;
    }

    /**
     * @return string|null
     */
    public function getOkvedName()
    {
        return $this->okvedName;
    }

    /**
     * @param string|null $okvedName
     */
    public function setOkvedName($okvedName)
    {
        $this->okvedName = $okvedName;
    }


}
