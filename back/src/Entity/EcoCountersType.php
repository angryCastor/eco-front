<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoCountersType
 *
 * @ORM\Table(name="eco_counters_type", uniqueConstraints={@ORM\UniqueConstraint(name="eco_counters_type_id_counters_type_uindex", columns={"id_counters_type"})})
 * @ORM\Entity
 */
class EcoCountersType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_counters_type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_counters_type_id_counters_type_seq", allocationSize=1, initialValue=1)
     */
    private $idCounterType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $CounterTypeName;

    /**
     * @ORM\OneToMany(targetEntity="EcoCounters", mappedBy="СountersType")
     */
    //private ?EcoCounters $Counters;

    /**
     * @return int
     */
    public function getIdCounterType(): int
    {
        return $this->idCounterType;
    }

    /**
     * @param int $idCounterType
     */
    public function setIdCounterType(int $idCounterType): EcoCountersType
    {
        $this->idCounterType = $idCounterType;
    }

    /**
     * @return string|null
     */
    public function getCounterTypeName(): ?string
    {
        return $this->CounterTypeName;
    }

    /**
     * @param string|null $CounterTypeName
     */
    public function setCounterTypeName(?string $CounterTypeName): EcoCountersType
    {
        $this->CounterTypeName = $CounterTypeName;
    }

    /**
     * @return EcoCounters|null
     */
    /*public function getCounters(): ?EcoCounters
    {
        return $this->Counters;
    }*/

    /**
     * @param EcoCounters|null $Counters
     */
    /*public function setEcoCounters(?EcoCounters $Counters = null): EcoCountersType
    {
        $this->Counters = $Counters;
    }*/




}
