<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Album;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
        ]);
    }
}
