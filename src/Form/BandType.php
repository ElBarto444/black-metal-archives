<?php

namespace App\Form;

use App\Entity\Band;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class BandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bandName', TextType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'label' => 'Band name',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
            ])
            ->add('bandGenre', TextType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
            ])
            ->add('bandPictureFile', VichFileType::class, [
                'attr' => [
                    'class' => 'rounded border border-primary placeholder-style mt-1',
                ],
                'label' => 'Band picture',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
                'required' => false,
                'download_uri' => false,
                'allow_delete' => false,
            ])
            ->add('bandCountry', CountryType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'placeholder' => 'Select a country',
                'label' => 'Country',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
            ])
            ->add('bandYear', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control border border-primary placeholder-style',
                ],
                'label' => 'Year of formation',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
                'choices' => [
                    1983 => 1983,
                    1984 => 1984,
                    1985 => 1985,
                    1986 => 1986,
                    1987 => 1987,
                    1988 => 1988,
                    1989 => 1989,
                    1990 => 1990,
                    1991 => 1991,
                    1992 => 1992,
                    1993 => 1993,
                    1994 => 1994,
                    1995 => 1995,
                    1996 => 1996,
                    1997 => 1997,
                    1998 => 1998,
                    1999 => 1999,
                    2000 => 2000,
                    2001 => 2001,
                    2002 => 2002,
                    2003 => 2003,
                    2004 => 2004,
                    2005 => 2005,
                    2006 => 2006,
                    2007 => 2007,
                    2008 => 2008,
                    2009 => 2009,
                    2010 => 2010,
                    2011 => 2011,
                    2012 => 2012,
                    2013 => 2013,
                    2014 => 2014,
                    2015 => 2015,
                    2016 => 2016,
                    2017 => 2017,
                    2018 => 2018,
                    2019 => 2019,
                    2020 => 2020,
                    2021 => 2021,
                    2022 => 2022,
                    2023 => 2023,

                ]

            ])
            ->add('bandLogoFile', VichFileType::class, [
                'attr' => [
                    'class' => 'rounded border border-primary placeholder-style mt-1',
                ],
                'label' => 'Band logo',
                'label_attr' => [
                    'class' => 'form-label letter-spacing fs-4'
                ],
                'required' => false,
                'download_uri' => false,
                'allow_delete' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Band::class,
        ]);
    }
}
