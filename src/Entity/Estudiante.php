<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EstudianteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstudianteRepository::class)]
#[ApiResource]
class Estudiante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $primerNombre = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $segundoNombre = null;

    #[ORM\Column(length: 30)]
    private ?string $primerApellido = null;

    #[ORM\Column(length: 30)]
    private ?string $segundoApellido = null;

    #[ORM\Column(length: 20)]
    private ?string $identificacion = null;

    #[ORM\Column]
    private ?bool $activo = true;

    #[ORM\OneToMany(mappedBy: 'estudiante', targetEntity: EstudianteParalelo::class)]
    private Collection $estudianteParalelos;

    public function __construct()
    {
        $this->estudianteParalelos = new ArrayCollection();
    }

    private function fullName(){
        return $this->primerNombre . ' ' . $this->segundoNombre . ' ' . $this->primerApellido . ' ' . $this->segundoApellido;
    }

    public function __toString()
    {
        return $this->fullName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimerNombre(): ?string
    {
        return $this->primerNombre;
    }

    public function setPrimerNombre(string $primerNombre): static
    {
        $this->primerNombre = $primerNombre;

        return $this;
    }

    public function getSegundoNombre(): ?string
    {
        return $this->segundoNombre;
    }

    public function setSegundoNombre(?string $segundoNombre): static
    {
        $this->segundoNombre = $segundoNombre;

        return $this;
    }

    public function getPrimerApellido(): ?string
    {
        return $this->primerApellido;
    }

    public function setPrimerApellido(string $primerApellido): static
    {
        $this->primerApellido = $primerApellido;

        return $this;
    }

    public function getSegundoApellido(): ?string
    {
        return $this->segundoApellido;
    }

    public function setSegundoApellido(string $segundoApellido): static
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }

    public function getIdentificacion(): ?string
    {
        return $this->identificacion;
    }

    public function setIdentificacion(string $identificacion): static
    {
        $this->identificacion = $identificacion;

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
     * @return Collection<int, EstudianteParalelo>
     */
    public function getEstudianteParalelos(): Collection
    {
        return $this->estudianteParalelos;
    }

    public function addEstudianteParalelo(EstudianteParalelo $estudianteParalelo): static
    {
        if (!$this->estudianteParalelos->contains($estudianteParalelo)) {
            $this->estudianteParalelos->add($estudianteParalelo);
            $estudianteParalelo->setEstudiante($this);
        }

        return $this;
    }

    public function removeEstudianteParalelo(EstudianteParalelo $estudianteParalelo): static
    {
        if ($this->estudianteParalelos->removeElement($estudianteParalelo)) {
            // set the owning side to null (unless already changed)
            if ($estudianteParalelo->getEstudiante() === $this) {
                $estudianteParalelo->setEstudiante(null);
            }
        }

        return $this;
    }
}
