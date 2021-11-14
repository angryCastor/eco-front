<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoOkved
 *
 * @ORM\Table(name="eco_okved")
 * @ORM\Entity
 */
class EcoOkved
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_okved", type="decimal", precision=38, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_okved_id_okved_seq", allocationSize=1, initialValue=1)
     */
    private $idOkved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kod", type="string", length=250, nullable=true)
     */
    private $kod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_okved", type="string", length=2500, nullable=true)
     */
    private $nameOkved;

    /**
     * @return string
     */
    public function getIdOkved(): string
    {
        return $this->idOkved;
    }

    /**
     * @param string $idOkved
     */
    public function setIdOkved(string $idOkved): void
    {
        $this->idOkved = $idOkved;
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
    public function getNameOkved(): ?string
    {
        return $this->nameOkved;
    }

    /**
     * @param string|null $nameOkved
     */
    public function setNameOkved(?string $nameOkved): void
    {
        $this->nameOkved = $nameOkved;
    }


}
