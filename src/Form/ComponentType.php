<?php
/**
 * Description of componentForm
 *
 * @author aritz
 */
namespace Form;

use Entity\Component;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ComponentForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, 
                    ['required'   => true,])
            ->add('positionX', NumberType::class, 
                    ['required'   => true,])
            ->add('positionY', NumberType::class, 
                    ['required'   => true,])
            ->add('positionZ', NumberType::class, 
                    ['required'   => true,])
            ->add('width', NumberType::class, 
                    ['required'   => true,])
            ->add('height', NumberType::class, 
                    ['required'   => true,])
            ->add('type', ChoiceType::class, [
                    'choices'  => array(
                        'Imagen' => 'image',
                        'Video' => 'video',
                        'Texto' => 'text',
                    )
                ])
            ->add('link', TextType::class)
            ->add('format', TextType::class)
            ->add('size', TextType::class)
            ->add('text', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Component::class,
        ]);
    }
}