<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Classification;
use App\Entity\Event;
use Doctrine\ORM\EntityRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('thumb',HiddenType::class, array(
                'block_name' => 'b_blob',
            ))
            ->add('title', TextType::class, array(
                'label' => 'Título Del Evento',
                'block_name' => 'b_title',
                'attr' => array(
                    'placeholder' => 'Título',
                    'class'=> 'form-control',
                    //'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            ->add('shortdescription', TextareaType::class, array(
                'label' => 'Descripción Corta',
                'block_name' => 'b_name',
                'attr' => array(
                    'placeholder' => 'Descripción Corta',
                    'class'=> 'form-control',
                    'style'=> 'height:150px;',
                )
            ))
            ->add('description', CKEditorType::class, array(
                'block_name' => 'b_des',
                'label' => 'Descripción Completa',
                'attr' => array(
                    'class'=> 'form-control',
                    'style'=> 'margin-bottom:15px',
                ),
                'config' => array(
                    'toolbar' => 'basic',
                    //'toolbar' => 'full',
                    'language' => 'es',
                ),
            ))
            ->add('categorised', EntityType::class, array(
                'label' => 'Categoría',
                'block_name' => 'b_cat',
                "class" => Category::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
                'attr' => array(
                    'class'=> 'form-control',
                    'style'=> 'height:50px;',
                )
            ))
            ->add('classification', EntityType::class, array(
                'label' => 'Clasificación',
                'block_name' => 'b_cla',
                "class" => Classification::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
                'attr' => array(
                    'class'=> 'form-control',
                    'style'=> 'height:50px;',
                )
            ))
            ->add('startDate', DateTimeType::class, array(
                'block_name' => 'b_inicio',
                'label' => 'Fecha y Hora de Inicio',
                'attr' => ['class' => 'ev-date-control'],
                'placeholder' => [
                    'year' => 'Año', 'month' => 'Mes', 'day' => 'Día',
                    'hour' => 'Hora', 'minute' => 'Minuto', 'second' => 'Segundo',
                ]
            ))
            ->add('duration', TimeType::class, array(
                'label' => 'Duración',
                'block_name' => 'b_duration',
                'placeholder' => [
                    'hour' => 'Horas', 'minute' => 'Minutos', 'second' => 'Segundos',
                ]

            ))

            ->add('coverImage', FileType::class, array(
                'label' => 'Portada',
                'block_name' => 'b_cover',
            ))
            //->add('status')
            ->add('addressname', TextType::class, array(
                'label' => 'Dirección',
                'block_name' => 'b_addr',
                'attr' => array(
                    'placeholder' => 'Direccón del evento',
                    'class'=> 'form-control',
                    //'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            //->add('lat')
            //->add('long')
            ->add('wordskeys', TextType::class, array(
                'label' => 'Etiquetas',
                'block_name' => 'b_wordskeys',
                'attr' => array(
                    'placeholder' => 'Palabras clave',
                    'class'=> 'form-control',
                    //'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            ->add('showguestlist', CheckboxType::class,array(
                'label' => 'Mostrar Lista de Participantes',
                'block_name' => 'b_showguestlist',
            ))
            //->add('interest')

            //->add('classification')
            //->add('user')
            ->add('Registrar', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-primary btn-big",
                    'style' => "grid-column: 2; width:200px;"
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
