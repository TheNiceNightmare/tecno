<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EstudianteParaleloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstudianteParaleloRepository::class)]
#[ApiResource]
class EstudianteParalelo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'estudianteParalelos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Estudiante $estudiante = null;

    #[ORM\ManyToOne(inversedBy: 'estudianteParalelos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Paralelo $paralelo = null;

    #[ORM\OneToMany(mappedBy: 'estudianteParalelo', targetEntity: Asistencia::class, cascade: ["remove"])]
    private Collection $asistencias;

    #[ORM\Column]
    private ?bool $activo = null;

    public function __construct()
    {
        $this->asistencias = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getEstudiante();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstudiante(): ?Estudiante
    {
        return $this->estudiante;
    }

    public function setEstudiante(?Estudiante $estudiante): static
    {
        $this->estudiante = $estudiante;

        return $this;
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
            $asistencia->setEstudianteParalelo($this);
        }

        return $this;
    }

    public function removeAsistencia(Asistencia $asistencia): static
    {
        if ($this->asistencias->removeElement($asistencia)) {
            // set the owning side to null (unless already changed)
            if ($asistencia->getEstudianteParalelo() === $this) {
                $asistencia->setEstudianteParalelo(null);
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
