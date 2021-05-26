<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Face;
use App\Entity\Women;
use App\Repository\CountryRepository;
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

class ModeleWomenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('title', ChoiceType::class, [
                'label' => 'Titre',
                'required' => true,
                'choices'  => [
                    'Madame' => 'Madame', 
                    'Mademoiselle' => 'Mademoiselle', 
                ]
            ])
            ->add('firstname', TextType::class, [
                'required' => true,
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom du modèle'
                ]
            ])
            ->add('lastname', TextType::class, [
                'required' => true,
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom du modèle'
                ]
            ])
            ->add('date_of_birth', TextType::class, [
                'required' => true,
                'label' => 'Date de naissance',
                'attr' => [
                    'placeholder' => 'JJ-MM-AAAA'
                ]
            ])
            ->add('phone_number', TextType::class, [
                'required' => true,
                'label' => 'N° de téléphone',
                'attr' => [
                    'placeholder' => 'Téléphone'
                ]
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Adresse e-mail',
                'attr' => [
                    'placeholder' => 'Email du modèle'
                ]
            ])
            ->add('street', TextType::class, [
                'required' => true,
                'label' => 'N° et rue',
                'attr' => [
                    'placeholder' => 'Adresse du modèle'
                ]
            ])
            ->add('zip_code', TextType::class, [
                'required' => true,
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'required' => true,
                'label' => 'Localité',
                'attr' => [
                    'placeholder' => 'Ville'
                ]
            ])
            ->add('country', EntityType::class, [
                'label' => 'Pays',
                'class' => Country::class,
                'choice_label' => 'name'
            ])
            ->add('native_language', TextType::class, [
                'required' => true,
                'label' => 'Langue maternelle'
            ])
            ->add('second_language', TextType::class, [
                'required' => false,
                'label' => 'Deuxième langue'
            ])
            ->add('third_language', TextType::class, [
                'required' => false,
                'label' => 'Troisième langue'
            ])
            ->add('fourth_language', TextType::class, [
                'required' => false,
                'label' => 'Quatrième langue'
            ])
            ->add('fifth_language', TextType::class, [
                'required' => false,
                'label' => 'Cinquième langue'
            ])
            ->add('comments', TextareaType::class, [
                'required' => false,
                'label' => 'Commentaires'
            ])
            ->add('size', IntegerType::class, [
                'required' => true,
                'label' => 'Taille en cm'
            ])
            ->add('chest', IntegerType::class, [
                'required' => true,
                'label' => 'Tour de poitrine'
            ])
            ->add('hips', IntegerType::class, [
                'required' => true,
                'label' => 'Tour de hanches'
            ])
            ->add('waist_size', IntegerType::class, [
                'required' => true,
                'label' => 'Tour de taille'
            ])
            ->add('clothing_size', IntegerType::class, [
                'required' => true,
                'label' => 'Taille de confection'
            ])
            ->add('shoes', IntegerType::class, [
                'required' => true,
                'label' => 'Pointure'
            ])
            ->add('hairs', ChoiceType::class, [
                'label' => 'Couleur des cheveux',
                'required' => true,
                'choices'  => [
                    'Chataîn' => 'Chataîn', 
                    'Brun' => 'Brun',
                    'Blond' => 'Blond',
                    'Roux' => 'Roux'

                ]
            ])
            ->add('eyes', TextType::class, [
                'required' => true,
                'label' => 'Couleur des yeux'
            ])
            ->add('face', EntityType::class, [
                'label' => 'Pays',
                'class' => Face::class,
                'choice_label' => 'morphology'
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
                'required' => false
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
            'data_class' => Women::class,
        ]);
    }
}
