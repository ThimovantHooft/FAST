<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $besch;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @ORM\OneToMany(targetEntity="Regel" , mappedBy="product")
     */
    private $regel;

    public function __construct()
    {
        $this->regel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBesch(): ?string
    {
        return $this->besch;
    }

    public function setBesch(string $besch): self
    {
        $this->besch = $besch;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * @return Collection|Regel[]
     */
    public function getRegel(): Collection
    {
        return $this->regel;
    }

    public function addRegel(Regel $regel): self
    {
        if (!$this->regel->contains($regel)) {
            $this->regel[] = $regel;
            $regel->setProduct($this);
        }

        return $this;
    }

    public function removeRegel(Regel $regel): self
    {
        if ($this->regel->contains($regel)) {
            $this->regel->removeElement($regel);
            // set the owning side to null (unless already changed)
            if ($regel->getProduct() === $this) {
                $regel->setProduct(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
