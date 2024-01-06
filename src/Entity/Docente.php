<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DocenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocenteRepository::class)]
#[ApiResource]
class Docente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $primerNombre = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $segundoNombre = null;

    #[ORM\Column(length: 50)]
    private ?string $primerApellido = null;

    #[ORM\Column(length: 50)]
    private ?string $segundoApellido = null;

    #[ORM\Column(length: 20)]
    private ?string $identificacion = null;

    #[ORM\OneToMany(mappedBy: 'docente', targetEntity: MateriaDocente::class, cascade: ["remove"])]
    private Collection $materiaDocentes;

    #[ORM\Column]
    private ?bool $activo = true;

    public function __construct()
    {
        $this->materiaDocentes = new ArrayCollection();
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

    /**
     * @return Collection<int, MateriaDocente>
     */
    public function getMateriaDocentes(): Collection
    {
        return $this->materiaDocentes;
    }

    public function addMateriaDocente(MateriaDocente $materiaDocente): static
    {
        if (!$this->materiaDocentes->contains($materiaDocente)) {
            $this->materiaDocentes->add($materiaDocente);
            $materiaDocente->setDocente($this);
        }

        return $this;
    }

    public function removeMateriaDocente(MateriaDocente $materiaDocente): static
    {
        if ($this->materiaDocentes->removeElement($materiaDocente)) {
            // set the owning side to null (unless already changed)
            if ($materiaDocente->getDocente() === $this) {
                $materiaDocente->setDocente(null);
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
