<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DonatieRepository")
 */
class Donatie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * Many donaties have one user. This is the owning side.
     * @ManyToOne(targetEntity="User", inversedBy="donatie")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ManyToOne(targetEntity="Winkel", inversedBy="donatie")
     * @JoinColumn(name="winkel_id" , referencedColumnName="id")
     */
    private $winkel;
    /**
     * @ORM\OneToMany(targetEntity="Regel", mappedBy="donatie")
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getWinkel(): ?Winkel
    {
        return $this->winkel;
    }

    public function setWinkel(?Winkel $winkel): self
    {
        $this->winkel = $winkel;

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
            $regel->setDonatie($this);
        }

        return $this;
    }

    public function removeRegel(Regel $regel): self
    {
        if ($this->regel->contains($regel)) {
            $this->regel->removeElement($regel);
            // set the owning side to null (unless already changed)
            if ($regel->getDonatie() === $this) {
                $regel->setDonatie(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return strval( $this->id ) ;
    }

}
