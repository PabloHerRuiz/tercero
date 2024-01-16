<?php

namespace App\Entity;

use App\Repository\LibroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibroRepository::class)]
class Libro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\ManyToMany(targetEntity: Autor::class, inversedBy: 'libros')]
    private Collection $autor;

    public function __construct()
    {
        $this->autor = new ArrayCollection();
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

    /**
     * @return Collection<int, Autor>
     */
    public function getAutor(): Collection
    {
        return $this->autor;
    }

    public function addAutor(Autor $autor): static
    {
        if (!$this->autor->contains($autor)) {
            $this->autor->add($autor);
        }

        return $this;
    }

    public function removeAutor(Autor $autor): static
    {
        $this->autor->removeElement($autor);

        return $this;
    }
}
