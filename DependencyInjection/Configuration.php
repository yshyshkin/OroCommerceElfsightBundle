<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\DependencyInjection;

use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Oro\Bundle\ConfigBundle\DependencyInjection\SettingsBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(YsToolsOroCommerceElfsightExtension::ALIAS);
        $rootNode = $treeBuilder->getRootNode();

        SettingsBuilder::append(
            $rootNode,
            [
                'registered' => ['value' => false, 'type' => 'boolean'],
            ]
        );

        return $treeBuilder;
    }

    /**
     * @param string $key
     * @return string
     */
    public static function getConfigKey($key)
    {
        return YsToolsOroCommerceElfsightExtension::ALIAS . ConfigManager::SECTION_MODEL_SEPARATOR . $key;
    }
}
