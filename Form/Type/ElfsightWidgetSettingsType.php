<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Form type for the settings of Product Mini-Block content widget.
 */
class ElfsightWidgetSettingsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'identifier',
            ElfsightWidgetIdentifierType::class,
            [
                'label' => 'ystools.orocommerceelfsight.elfsightwidget.identifier.label',
                'required' => true,
                'block' => 'options',
                'block_config' => [
                    'options' => [
                        'title' => 'ystools.orocommerceelfsight.content_widget_type.sections.options'
                    ]
                ],
                'constraints' => [
                    new NotBlank(),
                ]
            ]
        );
    }
}
