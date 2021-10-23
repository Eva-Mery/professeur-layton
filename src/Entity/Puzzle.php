<?php

namespace App\Entity;

use App\Repository\PuzzleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PuzzleRepository::class)
 */
class Puzzle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Jeu;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numero;

    /**
     * @ORM\Column(type="text")
     */
    private $Enonce;

    /**
     * @ORM\Column(type="text")
     */
    private $Solution;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJeu(): ?string
    {
        return $this->Jeu;
    }

    public function setJeu(string $Jeu): self
    {
        $this->Jeu = $Jeu;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->Numero;
    }

    public function setNumero(int $Numero): self
    {
        $this->Numero = $Numero;

        return $this;
    }

    public function getEnonce(): ?string
    {
        return $this->Enonce;
    }

    public function setEnonce(string $Enonce): self
    {
        $this->Enonce = $Enonce;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->Solution;
    }

    public function setSolution(string $Solution): self
    {
        $this->Solution = $Solution;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }
}
