<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use App\Entity\SongTracklist;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
#[Vich\Uploadable]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $albumTitle = null;

    #[ORM\ManyToOne(inversedBy: 'albums')]
    private ?Band $bandName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $albumYear = null;

    #[Vich\UploadableField(mapping: 'album_cover_file', fileNameProperty: 'albumCover')]
    #[Assert\File(
        maxSize: '1M',
        mimeTypes: ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'],
    )]
    private ?File $albumCoverFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $albumCover = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'album', targetEntity: SongTracklist::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $songTracklists;

    #[ORM\Column(length: 255)]
    private ?string $albumType = null;

    public function __construct()
    {
        $this->songTracklists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlbumTitle(): ?string
    {
        return $this->albumTitle;
    }

    public function setAlbumTitle(string $albumTitle): static
    {
        $this->albumTitle = $albumTitle;

        return $this;
    }

    public function getBandName(): ?Band
    {
        return $this->bandName;
    }

    public function setBandName(?Band $bandName): static
    {
        $this->bandName = $bandName;

        return $this;
    }

    public function getAlbumYear(): ?\DateTimeInterface
    {
        return $this->albumYear;
    }

    public function setAlbumYear(?\DateTimeInterface $albumYear): static
    {
        $this->albumYear = $albumYear;

        return $this;
    }

    public function getAlbumCover(): ?string
    {
        return $this->albumCover;
    }

    public function setAlbumCover(?string $albumCover): static
    {
        $this->albumCover = $albumCover;

        return $this;
    }

    /**
     * Get the value of albumCoverFile
     *
     * @return ?File
     */
    public function getAlbumCoverFile(): ?File
    {
        return $this->albumCoverFile;
    }

    /**
     * Set the value of albumCoverFile
     *
     * @param ?File $albumCoverFile
     *
     * @return self
     */
    public function setAlbumCoverFile(?File $image): self
    {
        $this->albumCoverFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    /**
     * Get the value of updatedAt
     *
     * @return ?DateTimeInterface
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param ?DateTimeInterface $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, SongTracklist>
     */
    public function getSongTracklists(): Collection
    {
        return $this->songTracklists;
    }

    public function addSongTracklist(SongTracklist $songTracklist): static
    {
        if (!$this->songTracklists->contains($songTracklist)) {
            $this->songTracklists->add($songTracklist);
            $songTracklist->setSong($this);
        }

        return $this;
    }

    public function removeSongTracklist(SongTracklist $songTracklist): static
    {
        if ($this->songTracklists->removeElement($songTracklist)) {
            // set the owning side to null (unless already changed)
            if ($songTracklist->getSong() === $this) {
                $songTracklist->setSong(null);
            }
        }

        return $this;
    }

    public function getAlbumType(): ?string
    {
        return $this->albumType;
    }

    public function setAlbumType(string $albumType): static
    {
        $this->albumType = $albumType;

        return $this;
    }
}
