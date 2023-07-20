<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Album;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('albumTitle', TextType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'label' => 'Album title',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
            ])
            ->add('albumYear', DateType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'label' => 'Date of release',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
                'years' => range(1983, 2023),
            ])
            ->add('albumCoverFile', VichFileType::class, [
                'attr' => [
                    'class' => 'rounded border border-primary placeholder-style mt-1',
                ],
                'label' => 'Album cover',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
                'required' => false,
                'download_uri' => false,
                'allow_delete' => false,
            ])
            ->add('albumType', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'label' => 'Album title',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
                'choices' => [
                    'Full-length' => 'Full-length',
                    'EP' => 'EP',
                    'Demo' => 'Demo',
                    'Split' => 'Split',
                    'Live album' => 'Live album',
                    'Compilation' => 'Compilation'
                ],
                'expanded' => false,
                'multiple' => false,
            ])
            ->add(
                'bandName',
                EntityType::class,
                [
                    'label' => 'Band name',
                    'label_attr' => [
                        'class' => 'form-label letter-spacing fs-4'
                    ],
                    'attr' => [
                        'class' => 'form-control border border-primary placeholder-style',
                    ],
                    'class' => Band::class,
                    'expanded' => false,
                    'choice_label' => 'bandName',
                    'query_builder' => function (EntityRepository $entityRepository): QueryBuilder {
                        return $entityRepository->createQueryBuilder('bn')
                            ->orderBy('bn.bandName', 'ASC');
                    },
                ]
            )
            ->add('songTracklists', LiveCollectionType::class, [
                'entry_type' => SongTracklistForm::class,
                'entry_options' => ['label' => false],
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
        ]);
    }
}
