<?php

namespace App\Form;

use App\Entity\Song;
use App\Entity\Album;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SongType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'songTitle',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control border border-primary placeholder-style',
                    ],
                    'label' => 'Track title',
                    'label_attr' => [
                        'class' => 'form-label letter-spacing fs-4'
                    ],
                ]
            )
            ->add(
                'songNumber',
                NumberType::class,
                [
                    'attr' => [
                        'class' => 'form-control w-100 border border-primary placeholder-style',
                    ],
                    'label' => '#',
                    'html5' => true,
                    'label_attr' => [
                        'class' => 'form-label letter-spacing fs-4'
                    ],
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
                ]
            )
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
                ]
                );
            // ->add(
            //     'songAlbum',
            //     EntityType::class,
            //     [
            //         'label' => 'Band name',
            //         'label_attr' => [
            //             'class' => 'form-label letter-spacing fs-4'
            //         ],
            //         'attr' => [
            //             'class' => 'd-none form-control border border-primary placeholder-style',
            //         ],
            //         'class' => Album::class,
            //         'expanded' => false,
            //         'choice_label' => 'albumTitle',
            //         // 'query_builder' => function (EntityRepository $entityRepository): QueryBuilder {
            //         //     return $entityRepository->createQueryBuilder('bn')
            //         //         ->orderBy('bn.bandName', 'ASC');
            //         // },
            //     ]
            // );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Song::class,
        ]);
    }
}
