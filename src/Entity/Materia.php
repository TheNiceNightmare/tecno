<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MateriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MateriaRepository::class)]
#[ApiResource]
class Materia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?bool $activo = true;

    #[ORM\OneToMany(mappedBy: 'materia', targetEntity: ParaleloMateria::class)]
    private Collection $paraleloMaterias;

    #[ORM\OneToMany(mappedBy: 'Materia', targetEntity: MateriaDocente::class)]
    private Collection $materiaDocentes;

    public function __construct()
    {
        $this->paraleloMaterias = new ArrayCollection();
        $this->materiaDocentes = new ArrayCollection();
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
     * @return Collection<int, ParaleloMateria>
     */
    public function getParaleloMaterias(): Collection
    {
        return $this->paraleloMaterias;
    }

    public function addParaleloMateria(ParaleloMateria $paraleloMateria): static
    {
        if (!$this->paraleloMaterias->contains($paraleloMateria)) {
            $this->paraleloMaterias->add($paraleloMateria);
            $paraleloMateria->setMateria($this);
        }

        return $this;
    }

    public function removeParaleloMateria(ParaleloMateria $paraleloMateria): static
    {
        if ($this->paraleloMaterias->removeElement($paraleloMateria)) {
            // set the owning side to null (unless already changed)
            if ($paraleloMateria->getMateria() === $this) {
                $paraleloMateria->setMateria(null);
            }
        }

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
            $materiaDocente->setMateria($this);
        }

        return $this;
    }

    public function removeMateriaDocente(MateriaDocente $materiaDocente): static
    {
        if ($this->materiaDocentes->removeElement($materiaDocente)) {
            // set the owning side to null (unless already changed)
            if ($materiaDocente->getMateria() === $this) {
                $materiaDocente->setMateria(null);
            }
        }

        return $this;
    }
}
