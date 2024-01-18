<?php

namespace App\Form;

use App\Entity\Categoria;
use App\Entity\Producto;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nombre', null, [
                'label' => 'Nombre del producto',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Introduce el nombre del producto']
            ])
            ->add('Cantidad', null, [
                'label' => 'Cantidad',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Introduce la cantidad']
            ])
            ->add('Precio', null, [
                'label' => 'Precio',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Introduce el precio']
            ])
            ->add('Descripcion', null, [
                'label' => 'Descripción',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Introduce la descripción']
            ])
            ->add('Categoria', EntityType::class, [
                'class' => Categoria::class,
                'label' => 'Categoría',
                'attr' => ['class' => 'form-control'],
                // 'choice_label' => 'nombre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
