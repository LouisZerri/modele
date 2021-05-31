<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Face;
use App\Entity\Men;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ModeleMenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Titre',
                    'value' => 'Monsieur',
                    'class' => 'form-control-sm'
                ],            
            ])
            ->add('firstname', TextType::class, [
                'required' => true,
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom du modèle',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('lastname', TextType::class, [
                'required' => true,
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom du modèle',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('date_of_birth', TextType::class, [
                'required' => true,
                'label' => 'Date de naissance',
                'attr' => [
                    'placeholder' => 'JJ-MM-AAAA',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('phone_number', TextType::class, [
                'required' => true,
                'label' => 'N° de téléphone',
                'attr' => [
                    'placeholder' => 'Téléphone',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Adresse e-mail',
                'attr' => [
                    'placeholder' => 'Email du modèle',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('street', TextType::class, [
                'required' => true,
                'label' => 'N° et rue',
                'attr' => [
                    'placeholder' => 'Adresse du modèle',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('zip_code', TextType::class, [
                'required' => true,
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Code postal',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('city', TextType::class, [
                'required' => true,
                'label' => 'Localité',
                'attr' => [
                    'placeholder' => 'Ville',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('country', EntityType::class, [
                'label' => 'Pays',
                'class' => Country::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('native_language', TextType::class, [
                'required' => true,
                'label' => 'Langue maternelle',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('second_language', TextType::class, [
                'required' => false,
                'label' => 'Deuxième langue',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('third_language', TextType::class, [
                'required' => false,
                'label' => 'Troisième langue',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('fourth_language', TextType::class, [
                'required' => false,
                'label' => 'Quatrième langue',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('fifth_language', TextType::class, [
                'required' => false,
                'label' => 'Cinquième langue',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('comments', TextareaType::class, [
                'required' => false,
                'label' => 'Commentaires',
                'attr' => [
                    'cols' => '10',
                    'rows' => '10'
                ]
            ])
            ->add('size', IntegerType::class, [
                'required' => true,
                'label' => 'Taille en cm',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('chest', IntegerType::class, [
                'required' => true,
                'label' => 'Tour de poitrine',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('hips', IntegerType::class, [
                'required' => true,
                'label' => 'Tour de hanches',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('waist_size', IntegerType::class, [
                'required' => true,
                'label' => 'Tour de taille',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('clothing_size', IntegerType::class, [
                'required' => true,
                'label' => 'Taille de confection',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('shoes', IntegerType::class, [
                'required' => true,
                'label' => 'Pointure',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('hairs', ChoiceType::class, [
                'label' => 'Couleur des cheveux',
                'required' => true,
                'choices'  => [
                    'Chataîn' => 'Chataîn', 
                    'Brun' => 'Brun',
                    'Blond' => 'Blond',
                    'Roux' => 'Roux'

                ],
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('eyes', TextType::class, [
                'required' => true,
                'label' => 'Couleur des yeux',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('face', EntityType::class, [
                'label' => 'Morphologie du visage',
                'class' => Face::class,
                'choice_label' => 'morphology',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('tatoos', CheckboxType::class, [
                'label' => 'Tatouages',
                'required' => false
            ])
            ->add('piercing', CheckboxType::class, [
                'label' => 'Piercing',
                'required' => false
            ])
            ->add('imageFile', FileType::class, [
                'label' => "Ajouter une photo de profil",
                'required' => false,
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('pictureFiles', FileType::class, [
                'label' => "Ajouter des photos au modèle (4 photos max)",
                'required' => false,
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Men::class,
        ]);
    }
}
