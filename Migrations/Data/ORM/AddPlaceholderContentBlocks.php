<?php

namespace YsTools\Bundle\OroCommerceElfsightBundle\Migrations\Data\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\CMSBundle\Entity\ContentBlock;
use Oro\Bundle\CMSBundle\Entity\TextContentVariant;
use Oro\Bundle\LocaleBundle\Entity\LocalizedFallbackValue;
use Oro\Bundle\OrganizationBundle\Entity\BusinessUnit;
use Oro\Bundle\OrganizationBundle\Entity\Organization;
use Oro\Bundle\OrganizationBundle\Migrations\Data\ORM\LoadOrganizationAndBusinessUnitData;

class AddPlaceholderContentBlocks extends AbstractFixture implements DependentFixtureInterface
{
    private array $blocks = [
        'placeholder-general-header-before' => 'Placeholder before the header on all pages',
        'placeholder-general-header-after' => 'Placeholder after the header on all pages',
        'placeholder-general-menu-after' => 'Placeholder after the menu on all pages',
        'placeholder-general-footer-before' => 'Placeholder before the footer on all pages',
        'placeholder-general-footer-after' => 'Placeholder before the footer on all pages',

        'placeholder-home-content-before' => 'Placeholder before the content on home page',
        'placeholder-home-content-after' => 'Placeholder after the content on home page',

        'placeholder-search-content-before' => 'Placeholder before the content on search results page',
        'placeholder-search-content-after' => 'Placeholder after the content on search results page',

        'placeholder-plp-content-before' => 'Placeholder before the content on product listing page',
        'placeholder-plp-content-after' => 'Placeholder after the content on product listing page',

        'placeholder-pdp-content-before' => 'Placeholder before the content on product details page',
        'placeholder-pdp-content-after' => 'Placeholder after the content on product details page',

        'placeholder-qof-content-before' => 'Placeholder before the content on quick order form page',
        'placeholder-qof-content-after' => 'Placeholder after the content on quick order form page',

        'placeholder-sl-content-before' => 'Placeholder before the content on shopping list page',
        'placeholder-sl-content-after' => 'Placeholder after the content on shopping list page',

        'placeholder-checkout-content-before' => 'Placeholder before the content on checkout page',
        'placeholder-checkout-content-after' => 'Placeholder after the content on checkout page',
    ];

    public function getDependencies(): array
    {
        return [
            LoadOrganizationAndBusinessUnitData::class
        ];
    }

    public function load(ObjectManager $manager)
    {
        $organization = $manager->getRepository(Organization::class)->getFirst();
        $businessUnit = $manager->getRepository(BusinessUnit::class)->getFirst();

        foreach ($this->blocks as $alias => $name) {
            $title = new LocalizedFallbackValue();
            $title->setString($name);

            $variant = new TextContentVariant();
            $variant->setDefault(true);
            $variant->setContent('');

            $contentBlock = new ContentBlock();
            $contentBlock->setAlias($alias);
            $contentBlock->addTitle($title);
            $contentBlock->addContentVariant($variant);
            $contentBlock->setOwner($businessUnit);
            $contentBlock->setOrganization($organization);

            $manager->persist($contentBlock);
        }

        $manager->flush();
    }
}
