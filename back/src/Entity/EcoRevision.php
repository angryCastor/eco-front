<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoRevision
 *
 * @ORM\Table(name="eco_revision")
 * @ORM\Entity
 */
class EcoRevision
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_revision", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_revision_id_revision_seq", allocationSize=1, initialValue=1)
     */
    private $idRevision;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_org_tax", type="integer", nullable=true)
     */
    private $idOrgTax;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_prov", type="date", nullable=true)
     */
    private $dateProv;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_ispoln", type="date", nullable=true)
     */
    private $dateIspoln;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commet", type="string", nullable=true)
     */
    private $commet;

    /**
     * @return int
     */
    public function getIdRevision(): int
    {
        return $this->idRevision;
    }

    /**
     * @param int $idRevision
     */
    public function setIdRevision(int $idRevision): void
    {
        $this->idRevision = $idRevision;
    }

    /**
     * @return int|null
     */
    public function getIdOrgTax(): ?int
    {
        return $this->idOrgTax;
    }

    /**
     * @param int|null $idOrgTax
     */
    public function setIdOrgTax(?int $idOrgTax): void
    {
        $this->idOrgTax = $idOrgTax;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     */
    public function setIdUser(?int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateProv(): ?\DateTime
    {
        return $this->dateProv;
    }

    /**
     * @param \DateTime|null $dateProv
     */
    public function setDateProv(?\DateTime $dateProv): void
    {
        $this->dateProv = $dateProv;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateIspoln(): ?\DateTime
    {
        return $this->dateIspoln;
    }

    /**
     * @param \DateTime|null $dateIspoln
     */
    public function setDateIspoln(?\DateTime $dateIspoln): void
    {
        $this->dateIspoln = $dateIspoln;
    }

    /**
     * @return string|null
     */
    public function getCommet(): ?string
    {
        return $this->commet;
    }

    /**
     * @param string|null $commet
     */
    public function setCommet(?string $commet): void
    {
        $this->commet = $commet;
    }


}
