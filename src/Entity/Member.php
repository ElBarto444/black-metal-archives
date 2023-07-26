<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MemberRepository;
use Vich\UploaderBundle\Entity\File;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $memberName = null;

    #[ORM\ManyToMany(targetEntity: Band::class, inversedBy: 'members')]
    private Collection $memberBand;

    #[Vich\UploadableField(mapping: 'member_picture_file', fileNameProperty: 'memberPicture')]
    #[Assert\File(
        maxSize: '1M',
        mimeTypes: ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'],
    )]
    private ?File $memberPictureFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $memberPicture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $memberBirthday = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->memberBand = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMemberName(): ?string
    {
        return $this->memberName;
    }

    public function setMemberName(string $memberName): static
    {
        $this->memberName = $memberName;

        return $this;
    }

    /**
     * @return Collection<int, Band>
     */
    public function getMemberBand(): Collection
    {
        return $this->memberBand;
    }

    public function addMemberBand(Band $memberBand): static
    {
        if (!$this->memberBand->contains($memberBand)) {
            $this->memberBand->add($memberBand);
        }

        return $this;
    }

    public function removeMemberBand(Band $memberBand): static
    {
        $this->memberBand->removeElement($memberBand);

        return $this;
    }

    public function getMemberPicture(): ?string
    {
        return $this->memberPicture;
    }

    public function setMemberPicture(?string $memberPicture): static
    {
        $this->memberPicture = $memberPicture;

        return $this;
    }

    public function getMemberBirthday(): ?\DateTimeInterface
    {
        return $this->memberBirthday;
    }

    public function setMemberBirthday(?\DateTimeInterface $memberBirthday): static
    {
        $this->memberBirthday = $memberBirthday;

        return $this;
    }

    /**
     * Get the value of memberPictureFile
     *
     * @return ?File
     */
    public function getMemberPictureFile(): ?File
    {
        return $this->memberPictureFile;
    }

    /**
     * Set the value of memberPictureFile
     *
     * @param ?File $memberPictureFile
     *
     * @return self
     */
    public function setMemberPictureFile(?File $image): self
    {
        $this->memberPictureFile = $image;
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
}
