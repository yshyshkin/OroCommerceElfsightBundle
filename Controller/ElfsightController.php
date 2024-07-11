<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\Controller;

use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Oro\Bundle\SecurityBundle\Attribute\AclAncestor;
use Oro\Bundle\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ElfsightController extends AbstractController
{
    public function __construct(
        private TokenStorageInterface $tokenStorage,
        private ConfigManager $configManager
    ) {
    }

    #[\Symfony\Component\Routing\Attribute\Route(path: '/register', name: 'ystools_orocommerce_elfsight_register')]
    #[AclAncestor('oro_cms_content_widget_view')]
    public function registerAction()
    {
        if ($this->tokenStorage->getToken()) {
            $user = $this->tokenStorage->getToken()->getUser();
            if ($user instanceof User) {
                $this->configManager->set('ystools_orocommerce_elfsight.registered', true, $user->getId());
                $this->configManager->flush();
            }
        }

        return new RedirectResponse('https://go.elfsight.io/click?pid=233&offer_id=3');
    }
}
