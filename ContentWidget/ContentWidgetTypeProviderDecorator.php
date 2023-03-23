<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\ContentWidget;

use Oro\Bundle\CMSBundle\Provider\ContentWidgetTypeProvider;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;

/**
 * Remove elfsight widget from the list if user is not registered
 */
class ContentWidgetTypeProviderDecorator extends ContentWidgetTypeProvider
{
    public function __construct(
        private ContentWidgetTypeProvider $originalProvider,
        private ConfigManager $configManager
    ) {
    }

    public function getAvailableContentWidgetTypes(): array
    {
        $types = $this->originalProvider->getAvailableContentWidgetTypes();

        if (!$this->configManager->get('ystools_orocommerce_elfsight.registered')) {
            unset($types['ystools.orocommerceelfsight.content_widget_type.elfsight_widget.label']);
        }

        return $types;
    }
}
