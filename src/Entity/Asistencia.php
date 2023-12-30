<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AsistenciaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AsistenciaRepository::class)]
#[ApiResource]
class Asistencia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hora = null;

    #[ORM\ManyToOne(inversedBy: 'asistencias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EstudianteParalelo $estudianteParalelo = null;

    #[ORM\ManyToOne(inversedBy: 'asistencias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ParaleloMateria $paraleloMateria = null;

    #[ORM\ManyToOne(inversedBy: 'asistencias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MateriaDocente $materiaDocente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): static
    {
        $this->hora = $hora;

        return $this;
    }

    public function getEstudianteParalelo(): ?EstudianteParalelo
    {
        return $this->estudianteParalelo;
    }

    public function setEstudianteParalelo(?EstudianteParalelo $estudianteParalelo): static
    {
        $this->estudianteParalelo = $estudianteParalelo;

        return $this;
    }

    public function getParaleloMateria(): ?ParaleloMateria
    {
        return $this->paraleloMateria;
    }

    public function setParaleloMateria(?ParaleloMateria $paraleloMateria): static
    {
        $this->paraleloMateria = $paraleloMateria;

        return $this;
    }

    public function getMateriaDocente(): ?MateriaDocente
    {
        return $this->materiaDocente;
    }

    public function setMateriaDocente(?MateriaDocente $materiaDocente): static
    {
        $this->materiaDocente = $materiaDocente;

        return $this;
    }
}
