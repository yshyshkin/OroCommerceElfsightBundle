<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\ContentWidget;

use Oro\Bundle\CMSBundle\ContentWidget\ContentWidgetTypeInterface;
use Oro\Bundle\CMSBundle\Entity\ContentWidget;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;
use YsTools\Bundle\OroCommerceElfsightBundle\Form\Type\ElfsightWidgetSettingsType;

/**
 * Content widget type for the Elfsight widgets
 */
class ElfsightWidgetType implements ContentWidgetTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getName(): string
    {
        return 'elfsight_widget';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel(): string
    {
        return 'ystools.orocommerceelfsight.content_widget_type.elfsight_widget.label';
    }

    /**
     * {@inheritdoc}
     */
    public function getBackOfficeViewSubBlocks(ContentWidget $contentWidget, Environment $twig): array
    {
        $data = $this->getWidgetData($contentWidget);

        return [
            [
                'title' => 'ystools.orocommerceelfsight.content_widget_type.sections.options',
                'subblocks' => [
                    [
                        'data' => [
                            $twig->render('@YsToolsOroCommerceElfsight/ElfsightWidget/options.html.twig', $data)
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getSettingsForm(ContentWidget $contentWidget, FormFactoryInterface $formFactory): ?FormInterface
    {
        return $formFactory->create(ElfsightWidgetSettingsType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getWidgetData(ContentWidget $contentWidget): array
    {
        return $contentWidget->getSettings();
    }

    /**
     * {@inheritdoc}
     */
    public function isInline(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultTemplate(ContentWidget $contentWidget, Environment $twig): string
    {
        $data = $this->getWidgetData($contentWidget);

        return $twig->render('@YsToolsOroCommerceElfsight/ElfsightWidget/widget.html.twig', $data);
    }
}
