<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ElfsightWidgetController extends AbstractController
{
    /**
     * @Route("/", name="ystools_orocommerce_elfsight_index")
     * @Template
     *
     * TODO: cover with ACL
     */
    public function indexAction(): array
    {
        return [
//            'entity_class' => Contact::class
        ];
    }
}
