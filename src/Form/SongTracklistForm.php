<?php

namespace App\Form;

use App\Entity\Album;
use App\Entity\SongTracklist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SongTracklistForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('songTitle', TextType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'label' => 'Album title',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
            ])
            ->add(
                'songLyrics',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control border border-primary placeholder-style',
                    ],
                    'label' => 'Lyrics',
                    'label_attr' => [
                        'class' => 'form-label letter-spacing fs-4'
                    ],
                    'required' => false,
                ]
            )
            ->add(
                'songDuration',
                TimeType::class,
                [
                    'attr' => [
                        'class' => 'form-control border px-0 border-primary placeholder-style',
                    ],
                    'label' => 'Duration',
                    'label_attr' => [
                        'class' => 'form-label letter-spacing fs-4'
                    ],
                    'input_format' => 'H:i:s'
                ]
            )
            ->add(
                'songNumber',
                NumberType::class,
                [
                    'attr' => [
                        'class' => 'form-control border border-primary placeholder-style',
                    ],
                    'label' => '#',
                    'html5' => true,
                    'label_attr' => [
                        'class' => 'form-label letter-spacing fs-4'
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SongTracklist::class,
        ]);
    }
}
