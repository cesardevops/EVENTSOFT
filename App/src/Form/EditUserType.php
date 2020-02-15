<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'block_name' => 'block_name',
                'attr' => array(
                    'placeholder' => 'Nombres',
                    'class'=> 'form-control',
                )
            ))
            ->add('surname', TextType::class, array(
                'block_name' => 'block_surname',
                'attr' => array(
                    'placeholder' => 'Apellidos',
                    'class'=> 'form-control',
                )
            ))
            ->add('password', PasswordType::class, array(
                'block_name' => 'block_password',
                'attr' => array(
                    'placeholder' => 'Password',
                    'class'=> 'form-control',
                )
            ))
            ->add('phone', TextType::class, array(
                'block_name' => 'block_phone',
                'attr' => array(
                    'placeholder' => 'Telefono',
                    'class'=> 'form-control',
                )
            ))
            ->add('birthday', BirthdayType::class, array(
                'block_name' => 'block_date',
                'attr' => array(
                    'class'=> 'ev-date-control',
                )
            ))
            ->add('gender', ChoiceType::class, array(
                'block_name' => 'block_gender',
                'choices'  => array(
                    'Varón' => true,
                    'Mujer' => false,
                ),
                "attr" => array(
                    "class" => "form-control"
                )
            ))

            ->add('Registrar', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-primary btn-big",
                    'style' => "grid-column: 2;"
                )
            ))
            ->add('company', ChoiceType::class, array(
                'block_name' => 'blockcompany',
                'choices'  => array(
                    'Si' => true,
                    'No' => false,
                ),
                "attr" => array(
                    "class" => "form-control"
                )
            ))
            ->add('companyid', TextType::class, array(
                'block_name' => 'block_cid',
                'required' => false,
                'attr' => array(
                    'required' => false,
                    'placeholder' => 'Doc Identidad',
                    'class'=> 'form-control',
                )
            ))
            ->add('description', TextareaType::class, array(
                'block_name' => 'block_description',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Descripción',
                    'class'=> 'form-control',
                )
            ))
        ;
        /*
        $builder
            ->add('name')
            ->add('surname')
            ->add('password')
            ->add('phone')
            ->add('address')
            ->add('gender')
            ->add('birthday')
            ->add('company')
            ->add('companyid')
            ->add('description')
            ->add('coverimage')
            ->add('coverprofile')
        ;*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
