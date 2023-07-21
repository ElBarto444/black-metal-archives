<?php

namespace App\Entity;

use App\Entity\Album;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SongTracklistRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SongTracklistRepository::class)]
class SongTracklist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'songTracklists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Album $album = null;

    #[ORM\Column(length: 255)]
    private ?string $songTitle = null;

    #[ORM\Column]
    #[Assert\Positive()]
    private ?int $songNumber = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $songDuration = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $songLyrics = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSong(): ?Album
    {
        return $this->album;
    }

    public function setSong(?Album $album): static
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get the value of songNumber
     *
     * @return ?int
     */
    public function getSongNumber(): ?int
    {
        return $this->songNumber;
    }

    /**
     * Set the value of songNumber
     *
     * @param ?int $songNumber
     *
     * @return self
     */
    public function setSongNumber(?int $songNumber): self
    {
        $this->songNumber = $songNumber;

        return $this;
    }

    /**
     * Get the value of songDuration
     *
     * @return ?DateTimeInterface
     */
    public function getSongDuration(): ?DateTimeInterface
    {
        return $this->songDuration;
    }

    /**
     * Set the value of songDuration
     *
     * @param ?DateTimeInterface $songDuration
     *
     * @return self
     */
    public function setSongDuration(?DateTimeInterface $songDuration): self
    {
        $this->songDuration = $songDuration;

        return $this;
    }

    /**
     * Get the value of songLyrics
     *
     * @return ?string
     */
    public function getSongLyrics(): ?string
    {
        return $this->songLyrics;
    }

    /**
     * Set the value of songLyrics
     *
     * @param ?string $songLyrics
     *
     * @return self
     */
    public function setSongLyrics(?string $songLyrics): self
    {
        $this->songLyrics = $songLyrics;

        return $this;
    }

    /**
     * Get the value of songTitle
     *
     * @return ?string
     */
    public function getSongTitle(): ?string
    {
        return $this->songTitle;
    }

    /**
     * Set the value of songTitle
     *
     * @param ?string $songTitle
     *
     * @return self
     */
    public function setSongTitle(?string $songTitle): self
    {
        $this->songTitle = $songTitle;

        return $this;
    }

    /**
     * Get the value of album
     *
     * @return ?Album
     */
    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    /**
     * Set the value of album
     *
     * @param ?Album $album
     *
     * @return self
     */
    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }
}
