<?php

namespace App\Entity;

use App\Entity\Album;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SongRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SongRepository::class)]
class Song
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $songTitle = null;

    #[ORM\Column]
    #[Assert\Positive()]
    private ?int $songNumber = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $songDuration = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $songLyrics = null;

    #[ORM\ManyToOne(inversedBy: 'songs')]
    private ?Album $songAlbum = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSongTitle(): ?string
    {
        return $this->songTitle;
    }

    public function setSongTitle(string $songTitle): static
    {
        $this->songTitle = $songTitle;

        return $this;
    }

    public function getSongNumber(): ?int
    {
        return $this->songNumber;
    }

    public function setSongNumber(int $songNumber): static
    {
        $this->songNumber = $songNumber;

        return $this;
    }

    public function getSongDuration(): ?\DateTimeInterface
    {
        return $this->songDuration;
    }

    public function setSongDuration(?\DateTimeInterface $songDuration): static
    {
        $this->songDuration = $songDuration;

        return $this;
    }

    public function getSongLyrics(): ?string
    {
        return $this->songLyrics;
    }

    public function setSongLyrics(?string $songLyrics): static
    {
        $this->songLyrics = $songLyrics;

        return $this;
    }

    public function getSongAlbum(): ?Album
    {
        return $this->songAlbum;
    }

    public function setSongAlbum(?Album $songAlbum): static
    {
        $this->songAlbum = $songAlbum;

        return $this;
    }
}
