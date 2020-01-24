<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegelRepository")
 */
class Regel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aantal;

    /**
     * @ORM\ManyToOne(targetEntity="Donatie", inversedBy="regel")
     * @ORM\JoinColumn(name="donatie_id" , referencedColumnName="id")
     */
    private $donatie;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="regel")
     * @ORM\JoinColumn(name="product_id" , referencedColumnName="id")
     */
    private $product;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(?int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getDonatie(): ?Donatie
    {
        return $this->donatie;
    }

    public function setDonatie(?Donatie $donatie): self
    {
        $this->donatie = $donatie;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
