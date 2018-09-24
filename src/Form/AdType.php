<?php
/**
 * Description of adForm
 *
 * @author aritz
 */
namespace Form;

use Entity\Component;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityManager = $options['entity_manager'];
        $components = $entityManager->getRepository("Entity\Component")->findAll();
        $builder->add('component', EntityType::class, array(
            'class' => Component::class,
            'choices' => $components,
            'choice_label' => function ($component) {
                return $component->getName();
            }
        ));
    }

}