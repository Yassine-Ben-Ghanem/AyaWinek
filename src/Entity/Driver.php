<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DriverRepository::class)
 */
class Driver
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_mame;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $account_email;

    /**
     * @ORM\OneToOne(targetEntity=Car::class, mappedBy="driver_id", cascade={"persist", "remove"})
     */
    private $car;

    /**
     * @ORM\OneToMany(targetEntity=Ride::class, mappedBy="driver")
     */
    private $rides;

    public function __construct()
    {
        $this->rides = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstMame(): ?string
    {
        return $this->first_mame;
    }

    public function setFirstMame(string $first_mame): self
    {
        $this->first_mame = $first_mame;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getNumberTel(): ?int
    {
        return $this->number_tel;
    }

    public function setNumberTel(int $number_tel): self
    {
        $this->number_tel = $number_tel;

        return $this;
    }

    public function getAccountEmail(): ?string
    {
        return $this->account_email;
    }

    public function setAccountEmail(string $account_email): self
    {
        $this->account_email = $account_email;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): self
    {
        // set the owning side of the relation if necessary
        if ($car->getDriverId() !== $this) {
            $car->setDriverId($this);
        }

        $this->car = $car;

        return $this;
    }

    /**
     * @return Collection|Ride[]
     */
    public function getRides(): Collection
    {
        return $this->rides;
    }

    public function addRide(Ride $ride): self
    {
        if (!$this->rides->contains($ride)) {
            $this->rides[] = $ride;
            $ride->setDriver($this);
        }

        return $this;
    }

    public function removeRide(Ride $ride): self
    {
        if ($this->rides->removeElement($ride)) {
            // set the owning side to null (unless already changed)
            if ($ride->getDriver() === $this) {
                $ride->setDriver(null);
            }
        }

        return $this;
    }  
}
