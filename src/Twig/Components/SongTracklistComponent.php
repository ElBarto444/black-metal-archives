<?php

namespace App\Twig\Components;

use App\Entity\Song;
use App\Entity\Album;
use App\Form\SongType;
use App\Form\AlbumType;
use App\Entity\SongTracklist;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent()]
class SongTracklistComponent extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp(fieldName: 'formData')]
    public ?Album $album;

    public function instantiateForm(): FormInterface
    {
        return $this->createForm(
            AlbumType::class,
            $this->album,
        );
    }
}
