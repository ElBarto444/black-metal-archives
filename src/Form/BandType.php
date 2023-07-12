<?php

namespace App\Form;

use App\Entity\Band;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType as DateTime;

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
                    1983 => 0,
                    1984 => 0,
                    1985 => 0,
                    1986 => 0,
                    1987 => 0,
                    1988 => 0,
                    1989 => 0,
                    1990 => 0,
                    1991 => 0,
                    1992 => 0,
                    1993 => 0,
                    1994 => 0,
                    1995 => 0,
                    1996 => 0,
                    1997 => 0,
                    1998 => 0,
                    1999 => 0,
                    2000 => 0,
                    2001 => 0,
                    2002 => 0,
                    2003 => 0,
                    2004 => 0,
                    2005 => 0,
                    2006 => 0,
                    2007 => 0,
                    2008 => 0,
                    2009 => 0,
                    2010 => 0,
                    2011 => 0,
                    2012 => 0,
                    2013 => 0,
                    2014 => 0,
                    2015 => 0,
                    2016 => 0,
                    2017 => 0,
                    2018 => 0,
                    2019 => 0,
                    2020 => 0,
                    2021 => 0,
                    2022 => 0,
                    2023 => 0,
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Band::class,
        ]);
    }
}
