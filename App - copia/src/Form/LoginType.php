<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'block_name' => 'block_email_login',
                'attr' => array(
                    'placeholder' => 'Email',
                    'class'=> 'form-control',
                )
            ))
            ->add('password', PasswordType::class, array(
                'block_name' => 'block_password_login',
                'attr' => array(
                    'placeholder' => 'Password',
                    'class'=> 'form-control',
                )
            ))
            ->add('Entrar', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-primary btn-big"
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
