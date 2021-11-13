<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoKatOkved
 *
 * @ORM\Table(name="eco_kat_okved")
 * @ORM\Entity
 */
class EcoKatOkved
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_kat_okved", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_kat_okved_id_kat_okved_seq", allocationSize=1, initialValue=1)
     */
    private $idKatOkved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kat", type="string", nullable=true)
     */
    private $kat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

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
     * @var string|null
     *
     * @ORM\Column(name="punct_post", type="string", nullable=true)
     */
    private $punctPost;

    /**
     * @var int|null
     *
     * @ORM\Column(name="new_column", type="integer", nullable=true)
     */
    private $newColumn;

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
    public function getKat()
    {
        return $this->kat;
    }

    /**
     * @param string|null $kat
     */
    public function setKat($kat)
    {
        $this->kat = $kat;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * @return string|null
     */
    public function getPunctPost()
    {
        return $this->punctPost;
    }

    /**
     * @param string|null $punctPost
     */
    public function setPunctPost($punctPost)
    {
        $this->punctPost = $punctPost;
    }

    /**
     * @return int|null
     */
    public function getNewColumn()
    {
        return $this->newColumn;
    }

    /**
     * @param int|null $newColumn
     */
    public function setNewColumn($newColumn)
    {
        $this->newColumn = $newColumn;
    }


}
