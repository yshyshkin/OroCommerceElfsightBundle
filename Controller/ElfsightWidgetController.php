<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\Controller;

use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Oro\Bundle\SecurityBundle\Authentication\TokenAccessor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use YsTools\Bundle\OroCommerceElfsightBundle\Entity\ElfsightWidget;

class ElfsightWidgetController extends AbstractController
{
    public function __construct(
        private ConfigManager $configManager,
        private TokenAccessor $tokenAccessor
    ) {
    }

    /**
     * @Route("/", name="ystools_orocommerce_elfsight_index")
     * @Template
     * @AclAncestor("elfsight_widget_view")
     */
    public function indexAction(): array
    {
        return [
            'entity_class' => ElfsightWidget::class
        ];
    }

    /**
     * @Route("/register", name="ystools_orocommerce_elfsight_register")
     * @AclAncestor("elfsight_widget_create")
     */
    public function registerAction()
    {
        $organizationId = null;
        if ($this->tokenAccessor->getOrganization()) {
            $organizationId = $this->tokenAccessor->getOrganization()->getId();
        }

        $this->configManager->set('ystools_orocommerce_elfsight.registered', true, $organizationId);
        $this->configManager->flush();

        return new RedirectResponse('https://go.elfsight.io/click?pid=233&offer_id=3');
    }
}
