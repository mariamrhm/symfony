<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    
    {
        $builder 
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('isVerified')
            ->add('firstname')
            ->add('lastname')
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Delete profile image',
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
      
            ])
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'Role 1' => 'ROLE_1',
                    'Role 2' => 'ROLE_2',
                   
                ],
            ]);
    }
    
            
        
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

}