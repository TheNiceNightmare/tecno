<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CursoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursoRepository::class)]
#[ApiResource]
class Curso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?bool $activo = true;

    #[ORM\OneToMany(mappedBy: 'curso', targetEntity: Paralelo::class)]
    private Collection $paralelos;

    public function __construct()
    {
        $this->paralelos = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nombre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * @return Collection<int, Paralelo>
     */
    public function getParalelos(): Collection
    {
        return $this->paralelos;
    }

    public function addParalelo(Paralelo $paralelo): static
    {
        if (!$this->paralelos->contains($paralelo)) {
            $this->paralelos->add($paralelo);
            $paralelo->setCurso($this);
        }

        return $this;
    }

    public function removeParalelo(Paralelo $paralelo): static
    {
        if ($this->paralelos->removeElement($paralelo)) {
            // set the owning side to null (unless already changed)
            if ($paralelo->getCurso() === $this) {
                $paralelo->setCurso(null);
            }
        }

        return $this;
    }
}
