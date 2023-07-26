<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BandRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BandRepository::class)]
#[Vich\Uploadable]
class Band
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bandName = null;

    #[ORM\Column(length: 255)]
    private ?string $bandGenre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bandPicture = null;

    #[Vich\UploadableField(mapping: 'band_picture_file', fileNameProperty: 'bandPicture')]
    #[Assert\File(
        maxSize: '1M',
        mimeTypes: ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'],
    )]
    private ?File $bandPictureFile = null;

    #[ORM\Column(length: 255)]
    private ?string $bandCountry = null;

    #[ORM\Column(nullable: true)]
    private ?string $bandYear = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bandLogo = null;

    #[Vich\UploadableField(mapping: 'band_logo_file', fileNameProperty: 'bandLogo')]
    #[Assert\File(
        maxSize: '1M',
        mimeTypes: ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'],
    )]
    private ?File $bandLogoFile = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'bandName', targetEntity: Album::class, cascade: ['persist'])]
    private Collection $albums;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBandName(): ?string
    {
        return $this->bandName;
    }

    public function setBandName(string $bandName): static
    {
        $this->bandName = $bandName;

        return $this;
    }

    public function getBandGenre(): ?string
    {
        return $this->bandGenre;
    }

    public function setBandGenre(string $bandGenre): static
    {
        $this->bandGenre = $bandGenre;

        return $this;
    }

    public function getBandPictureFile(): ?File
    {
        return $this->bandPictureFile;
    }

    public function setBandPictureFile(File $image): Band
    {
        $this->bandPictureFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getBandCountry(): ?string
    {
        return $this->bandCountry;
    }

    public function setBandCountry(string $bandCountry): static
    {
        $this->bandCountry = $bandCountry;

        return $this;
    }

    public function getBandYear(): ?string
    {
        return $this->bandYear;
    }

    public function setBandYear(?string $bandYear): static
    {
        $this->bandYear = $bandYear;

        return $this;
    }

    public function getBandLogoFile(): ?File
    {
        return $this->bandLogoFile;
    }

    public function setBandLogoFile(File $image): Band
    {
        $this->bandLogoFile = $image;
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
     * Get the value of bandLogo
     *
     * @return ?string
     */
    public function getBandLogo(): ?string
    {
        return $this->bandLogo;
    }

    /**
     * Set the value of bandLogo
     *
     * @param ?string $bandLogo
     *
     * @return self
     */
    public function setBandLogo(?string $bandLogo): self
    {
        $this->bandLogo = $bandLogo;

        return $this;
    }

    /**
     * Get the value of bandPicture
     *
     * @return ?string
     */
    public function getBandPicture(): ?string
    {
        return $this->bandPicture;
    }

    /**
     * Set the value of bandPicture
     *
     * @param ?string $bandPicture
     *
     * @return self
     */
    public function setBandPicture(?string $bandPicture): self
    {
        $this->bandPicture = $bandPicture;

        return $this;
    }

    /**
     * @return Collection<int, Album>
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): static
    {
        if (!$this->albums->contains($album)) {
            $this->albums->add($album);
            $album->setBandName($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): static
    {
        if ($this->albums->removeElement($album)) {
            // set the owning side to null (unless already changed)
            if ($album->getBandName() === $this) {
                $album->setBandName(null);
            }
        }

        return $this;
    }
}
