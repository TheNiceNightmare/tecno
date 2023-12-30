<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ParaleloMateriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParaleloMateriaRepository::class)]
#[ApiResource]
class ParaleloMateria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'materia')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Paralelo $paralelo = null;

    #[ORM\ManyToOne(inversedBy: 'paraleloMaterias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Materia $materia = null;

    #[ORM\OneToMany(mappedBy: 'paraleloMateria', targetEntity: Asistencia::class)]
    private Collection $asistencias;

    #[ORM\Column]
    private ?bool $activo = true;

    public function __toString()
    {
        return $this->getParalelo();
    }

    public function __construct()
    {
        $this->asistencias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParalelo(): ?Paralelo
    {
        return $this->paralelo;
    }

    public function setParalelo(?Paralelo $paralelo): static
    {
        $this->paralelo = $paralelo;

        return $this;
    }

    public function getMateria(): ?Materia
    {
        return $this->materia;
    }

    public function setMateria(?Materia $materia): static
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * @return Collection<int, Asistencia>
     */
    public function getAsistencias(): Collection
    {
        return $this->asistencias;
    }

    public function addAsistencia(Asistencia $asistencia): static
    {
        if (!$this->asistencias->contains($asistencia)) {
            $this->asistencias->add($asistencia);
            $asistencia->setParaleloMateria($this);
        }

        return $this;
    }

    public function removeAsistencia(Asistencia $asistencia): static
    {
        if ($this->asistencias->removeElement($asistencia)) {
            // set the owning side to null (unless already changed)
            if ($asistencia->getParaleloMateria() === $this) {
                $asistencia->setParaleloMateria(null);
            }
        }

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
}
