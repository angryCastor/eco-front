<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoCounters
 *
 * @ORM\Table(name="eco_counters", uniqueConstraints={@ORM\UniqueConstraint(name="eco_counters_id_counters_uindex", columns={"id_counters"})})
 * @ORM\Entity
 */
class EcoCounters
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_counters", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_counters_id_counters_seq", allocationSize=1, initialValue=1)
     */
    private $idCounter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $CounterName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", nullable=true)
     */
    private $CounterAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geo_lat", type="string", nullable=true)
     */
    private $CounterGeoLat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="geo_lon", type="string", nullable=true)
     */
    private $CounterGeoLon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="counters_type", type="integer", nullable=true)
     */
    private $CounterType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EcoCountersType", inversedBy="id_counters_type")
     * @ORM\JoinColumn(name="counters_type", referencedColumnName="id_counters_type")
     */
    private ?EcoCountersType $CountersType;

    /**
     * @return string|null
     */
    public function getCounterName(): ?string
    {
        return $this->CounterName;
    }

    /**
     * @param string|null $CounterName
     */
    public function setCounterName(?string $CounterName): EcoCounters
    {
        $this->CounterName = $CounterName;
    }

    /**
     * @return string|null
     */
    public function getCounterAddress(): ?string
    {
        return $this->CounterAddress;
    }

    /**
     * @param string|null $CounterAddress
     */
    public function setCounterAddress(?string $CounterAddress): EcoCounters
    {
        $this->CounterAddress = $CounterAddress;
    }

    /**
     * @return string|null
     */
    public function getCounterGeoLat(): ?string
    {
        return $this->CounterGeoLat;
    }

    /**
     * @param string|null $CounterGeoLat
     */
    public function setCounterGeoLat(?string $CounterGeoLat): EcoCounters
    {
        $this->CounterGeoLat = $CounterGeoLat;
    }

    /**
     * @return string|null
     */
    public function getCounterGeoLon(): ?string
    {
        return $this->CounterGeoLon;
    }

    /**
     * @param string|null $CounterGeoLon
     */
    public function setCounterGeoLon(?string $CounterGeoLon): EcoCounters
    {
        $this->CounterGeoLon = $CounterGeoLon;
    }

    /**
     * @return EcoCountersType|null
     *
     */
    public function getCountersType(): ?EcoCountersType
    {
        return $this->CountersType;
    }

    /**
     * @param EcoCountersType|null $CountersType
     *
     * @return EcoCountersType
     */
    public function setEcoCountersType(?EcoCountersType $CountersType = null): EcoCounters
    {
        $this->CountersType = $CountersType;
    }

    /**
     * @return int|null
     */
    public function getCounterType(): ?int
    {
        return $this->CounterType;
    }

    /**
     * @param int|null $CounterType
     */
    public function setCounterType(?int $CounterType): void
    {
        $this->CounterType = $CounterType;
    }

}
