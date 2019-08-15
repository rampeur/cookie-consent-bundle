<?php

namespace Rampeur\Bundle\CookieConsentBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * Class RampeurCookieConsentExtension
 *
 * @package Rampeur\Bundle\CookieConsentBundle\DependencyInjection
 * @author  Julien Gautier
 * @company UnEspace SARL
 */
class RampeurCookieConsentExtension extends ConfigurableExtension
{
    /**
     * @inheritDoc
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $locator = new FileLocator(__DIR__ . '/../Resources/config');
        $loader = new YamlFileLoader($container, $locator);
        $loader->load('services.yml');

        $container->setParameter('rampeur_cookie_consent.config', $mergedConfig);
    }

}
