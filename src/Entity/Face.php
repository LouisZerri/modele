<?php

namespace App\Entity;

use App\Repository\FaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FaceRepository::class)
 */
class Face
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
    private $morphology;

    /**
     * @ORM\OneToMany(targetEntity=Women::class, mappedBy="face", orphanRemoval=true)
     */
    private $women;

    /**
     * @ORM\OneToMany(targetEntity=Men::class, mappedBy="face", orphanRemoval=true)
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

    public function getMorphology(): ?string
    {
        return $this->morphology;
    }

    public function setMorphology(string $morphology): self
    {
        $this->morphology = $morphology;

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
            $woman->setFace($this);
        }

        return $this;
    }

    public function removeWoman(Women $woman): self
    {
        if ($this->women->removeElement($woman)) {
            // set the owning side to null (unless already changed)
            if ($woman->getFace() === $this) {
                $woman->setFace(null);
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
            $man->setFace($this);
        }

        return $this;
    }

    public function removeMan(Men $man): self
    {
        if ($this->men->removeElement($man)) {
            // set the owning side to null (unless already changed)
            if ($man->getFace() === $this) {
                $man->setFace(null);
            }
        }

        return $this;
    }
}
