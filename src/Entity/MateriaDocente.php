<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MateriaDocenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MateriaDocenteRepository::class)]
#[ApiResource]
class MateriaDocente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'materiaDocentes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Materia $materia = null;

    #[ORM\ManyToOne(inversedBy: 'materiaDocentes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Docente $docente = null;

    #[ORM\OneToMany(mappedBy: 'materiaDocente', targetEntity: Asistencia::class , cascade: ["remove"])]
    private Collection $asistencias;

    #[ORM\Column]
    private ?bool $activo = true;

    public function __construct()
    {
        $this->asistencias = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getMateria() . ' ' . $this->getDocente();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDocente(): ?Docente
    {
        return $this->docente;
    }

    public function setDocente(?Docente $docente): static
    {
        $this->docente = $docente;

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
            $asistencia->setMateriaDocente($this);
        }

        return $this;
    }

    public function removeAsistencia(Asistencia $asistencia): static
    {
        if ($this->asistencias->removeElement($asistencia)) {
            // set the owning side to null (unless already changed)
            if ($asistencia->getMateriaDocente() === $this) {
                $asistencia->setMateriaDocente(null);
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
