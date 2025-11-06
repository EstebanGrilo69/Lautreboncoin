<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Description')
            ->add('Prix')
            ->add('Photo')/*, FileType::class,  [
                'label'=>'Photo (PDF file)',
                'mapped'=>false,
                'requierd'=>false,
                'constraints'=>[
                    new File(
                        maxSize: '1024k',
                        extensions: ['pdf'],
                        extensionsMessage: "S'il vous plaît, veuillez placer votre image du produit afin de valider l'annonce, merci"
                    )
                ]
                
            ])*/
            ->add('Localisation')
            ->add('Categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'libelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
