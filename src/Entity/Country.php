<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Women::class, mappedBy="country", orphanRemoval=true)
     */
    private $women;

    /**
     * @ORM\OneToMany(targetEntity=Men::class, mappedBy="country", orphanRemoval=true)
     */
    private $men;

    public function __construct()
    {
        $this->women = new ArrayCollection();
        $this->men = new ArrayCollection();
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

    /**
     * @return Collection|Women[]
     */
    public function getWomen(): Collection
    {
        return $this->women;
    }

    public function addWoman(Women $woman): self
    {
        if (!$this->women->contains($woman)) {
            $this->women[] = $woman;
            $woman->setCountry($this);
        }

        return $this;
    }

    public function removeWoman(Women $woman): self
    {
        if ($this->women->removeElement($woman)) {
            // set the owning side to null (unless already changed)
            if ($woman->getCountry() === $this) {
                $woman->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Men[]
     */
    public function getMen(): Collection
    {
        return $this->men;
    }

    public function addMan(Men $man): self
    {
        if (!$this->men->contains($man)) {
            $this->men[] = $man;
            $man->setCountry($this);
        }

        return $this;
    }

    public function removeMan(Men $man): self
    {
        if ($this->men->removeElement($man)) {
            // set the owning side to null (unless already changed)
            if ($man->getCountry() === $this) {
                $man->setCountry(null);
            }
        }

        return $this;
    }
}
