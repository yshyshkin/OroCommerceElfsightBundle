<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Form type for Elfsight identifier field
 */
class ElfsightWidgetIdentifierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return TextType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'elfsight_identifier';
    }
}
