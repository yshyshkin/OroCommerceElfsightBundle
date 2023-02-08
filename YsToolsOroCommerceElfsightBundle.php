<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use YsTools\Bundle\OroCommerceElfsightBundle\DependencyInjection\YsToolsOroCommerceElfsightExtension;

class YsToolsOroCommerceElfsightBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new YsToolsOroCommerceElfsightExtension();
    }
}
