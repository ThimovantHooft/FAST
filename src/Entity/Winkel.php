<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WinkelRepository")
 */
class Winkel
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $besch;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\OneToMany(targetEntity="Donatie" , mappedBy="winkel")
     */
    private $donatie;

    public function __construct()
    {
        $this->donatie = new ArrayCollection();
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

    public function setBesch(?string $besch): self
    {
        $this->besch = $besch;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection|Donatie[]
     */
    public function getDonatie(): Collection
    {
        return $this->donatie;
    }

    public function addDonatie(Donatie $donatie): self
    {
        if (!$this->donatie->contains($donatie)) {
            $this->donatie[] = $donatie;
            $donatie->setWinkel($this);
        }

        return $this;
    }

    public function removeDonatie(Donatie $donatie): self
    {
        if ($this->donatie->contains($donatie)) {
            $this->donatie->removeElement($donatie);
            // set the owning side to null (unless already changed)
            if ($donatie->getWinkel() === $this) {
                $donatie->setWinkel(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
