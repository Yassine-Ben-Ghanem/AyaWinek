<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $registration_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_places;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getRegistrationNumber(): ?int
    {
        return $this->registration_number;
    }

    public function setRegistrationNumber(int $registration_number): self
    {
        $this->registration_number = $registration_number;

        return $this;
    }

    public function getNumberPlaces(): ?int
    {
        return $this->number_places;
    }

    public function setNumberPlaces(int $number_places): self
    {
        $this->number_places = $number_places;

        return $this;
    }

    
}
