<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EcoUserRepository::class)
 * @ORM\Table(name="eco_user")
 */
class EcoUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private int $id;

    /**
     * @ORM\Column(name="fio", type="string")
     */
    private string $fio;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="user")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private ?User $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return EcoUser
     */
    public function setId(int $id): EcoUser
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFio(): string
    {
        return $this->fio;
    }

    /**
     * @param string $fio
     *
     * @return EcoUser
     */
    public function setFio(string $fio): EcoUser
    {
        $this->fio = $fio;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return EcoUser
     */
    public function setUser(?User $user): EcoUser
    {
        $this->user = $user;

        return $this;
    }
}
