<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\ContentWidget;

use Oro\Bundle\CMSBundle\Provider\ContentWidgetTypeProvider;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;

/**
 * Remove elfsight widget from the list if user is not registered
 */
class ContentWidgetTypeProviderDecorator extends ContentWidgetTypeProvider
{
    /** @var ContentWidgetTypeProvider */
    private $originalProvider;

    /** @var ConfigManager */
    private $configManager;

    public function __construct(
        ContentWidgetTypeProvider $originalProvider,
        ConfigManager $configManager
    ) {
        $this->originalProvider = $originalProvider;
        $this->configManager = $configManager;
    }

    public function getAvailableContentWidgetTypes(): array
    {
        $types = $this->originalProvider->getAvailableContentWidgetTypes();

        if (!$this->configManager->get('ystools_orocommerce_elfsight.registered')) {
            foreach ($types as $key => $value) {
                if ($value === ElfsightWidgetType::getName()) {
                    unset($types[$key]);
                    break;
                }
            }
        }

        return $types;
    }
}
