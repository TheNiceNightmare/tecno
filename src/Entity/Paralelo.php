<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ParaleloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParaleloRepository::class)]
#[ApiResource]
class Paralelo
{


    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?bool $activo = true;

    #[ORM\OneToMany(mappedBy: 'paralelo', targetEntity: EstudianteParalelo::class, cascade : ["remove"])]
    private Collection $estudianteParalelos;

    #[ORM\ManyToOne(inversedBy: 'paralelos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Curso $curso = null;

    #[ORM\OneToMany(mappedBy: 'paralelo', targetEntity: ParaleloMateria::class, cascade : ["remove"])]
    private Collection $paraleloMaterias;
    

    public function __construct()
    {
        $this->estudianteParalelos = new ArrayCollection();
        $this->paraleloMaterias = new ArrayCollection();
    }
    

    public function fullName(){
        return $this->nombre . ' (' . $this->getCurso() . ')';
    }

    public function __toString()
    {
        return $this->fullName();
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
            $estudianteParalelo->setParalelo($this);
        }

        return $this;
    }

    public function removeEstudianteParalelo(EstudianteParalelo $estudianteParalelo): static
    {
        if ($this->estudianteParalelos->removeElement($estudianteParalelo)) {
            // set the owning side to null (unless already changed)
            if ($estudianteParalelo->getParalelo() === $this) {
                $estudianteParalelo->setParalelo(null);
            }
        }

        return $this;
    }

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): static
    {
        $this->curso = $curso;

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
            $paraleloMateria->setParalelo($this);
        }

        return $this;
    }

    public function removeParaleloMaterias(ParaleloMateria $paraleloMateria): static
    {
        if ($this->paraleloMaterias->removeElement($paraleloMateria)) {
            // set the owning side to null (unless already changed)
            if ($paraleloMateria->getParalelo() === $this) {
                $paraleloMateria->setParalelo(null);
            }
        }

        return $this;
    }
}
