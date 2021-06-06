<?php

namespace App\Entity;

use App\Repository\RideRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RideRepository::class)
 */
class Ride
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $pick_up_time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pick_up_from;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $drop_to;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_ride;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    

    

    
  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPickUpTime(): ?\DateTimeInterface
    {
        return $this->pick_up_time;
    }

    public function setPickUpTime(\DateTimeInterface $pick_up_time): self
    {
        $this->pick_up_time = $pick_up_time;

        return $this;
    }

    public function getPickUpFrom(): ?string
    {
        return $this->pick_up_from;
    }

    public function setPickUpFrom(string $pick_up_from): self
    {
        $this->pick_up_from = $pick_up_from;

        return $this;
    }

    public function getDropTo(): ?string
    {
        return $this->drop_to;
    }

    public function setDropTo(string $drop_to): self
    {
        $this->drop_to = $drop_to;

        return $this;
    }

    public function getTypeRide(): ?string
    {
        return $this->type_ride;
    }

    public function setTypeRide(string $type_ride): self
    {
        $this->type_ride = $type_ride;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

   

    
}
