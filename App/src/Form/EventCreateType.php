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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Título Del Evento',
                'block_name' => 'b_title',
                'attr' => array(
                    'placeholder' => 'Título',
                    'class'=> 'form-control',
                    'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            ->add('name', TextType::class, array(
                'label' => 'Nombre del Evento',
                'block_name' => 'b_name',
                'attr' => array(
                    'placeholder' => 'Nombre',
                    'class'=> 'form-control',
                    'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            ->add('description', CKEditorType::class, array(
                'block_name' => 'b_des',
                'attr' => array(
                    'placeholder' => 'Nombre Del Evento',
                    'class'=> 'form-control',
                    'style'=> 'margin-bottom:15px',
                ),
                'config' => array(
                    //'toolbar' => 'basic',
                    'toolbar' => 'full',
                    'language' => 'es',
                    'skin' => 'moono-lisa',
                    //'uiColor' => '#000',
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
                    'style'=> 'height:50px; margin-bottom:15px',
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
                    'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            ->add('startDate', DateTimeType::class, array(
                'block_name' => 'b_inicio',
                'label' => 'Fecha y Hora de Inicio',
                'attr' => ['class' => 'js-datepicker'],
                'placeholder' => [
                    'year' => 'Año', 'month' => 'Mes', 'day' => 'Día',
                    'hour' => 'Hora', 'minute' => 'Minuto', 'second' => 'Segundo',
                ]
            ))
            ->add('duration', TimeType::class, array(
                'label' => 'Duración',
                'block_name' => 'b_duracion',
                'placeholder' => [
                    'hour' => 'Horas', 'minute' => 'Minutos', 'second' => 'Segundos',
                ],
                'attr' => array(
                    'style'=> 'margin-bottom:15px',
                )

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
                    'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            //->add('lat')
            //->add('long')
            ->add('wordskeys', TextType::class, array(
                'label' => 'Etiquetas',
                'block_name' => 'b_work',
                'attr' => array(
                    'placeholder' => 'Palabras clave',
                    'class'=> 'form-control',
                    'style'=> 'height:50px; margin-bottom:15px',
                )
            ))
            ->add('showguestlist', CheckboxType::class,array(
                'label' => 'Mostrar Lista de Participantes'
            ))
            //->add('interest')

            //->add('classification')
            //->add('user')
            ->add('Registrar', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-primary btn-big",
                    'style' => "grid-column: 2;"
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
