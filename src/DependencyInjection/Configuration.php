<?php

namespace Rampeur\Bundle\CookieConsentBundle\DependencyInjection;

use App\Kernel;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Rampeur\Bundle\CookieConsentBundle\DependencyInjection
 * @author  Nikita Loges
 * @author  Julien Gautier <rampeur@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        if (Kernel::VERSION_ID >= 40200) {
            $treeBuilder = new TreeBuilder('rampeur_cookie_consent');
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $treeBuilder = new TreeBuilder();
            $rootNode = $treeBuilder->root('rampeur_cookie_consent');
        }
        $rootNode
            ->children()
                ->arrayNode('layout')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('position')->defaultValue('bottom-right')->end()
                        ->booleanNode('static')->defaultFalse()->end()
                        ->scalarNode('theme')->defaultValue('wire')->end()
                        ->arrayNode('palette')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('popup')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('background')->defaultValue('#333333')->end()
                                        ->scalarNode('text')->defaultValue('#ffffff')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('button')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('background')->defaultValue('transparent')->end()
                                        ->scalarNode('text')->defaultValue('#14a7d0')->end()
                                        ->scalarNode('border')->defaultValue('#14a7d0')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('policy_url')->defaultNull()->end()
                ->scalarNode('policy_route')->defaultNull()->end()
                ->scalarNode('template')->defaultNull()->end()
                ->scalarNode('assets_on')->defaultTrue()->end()
            ->end();

        return $treeBuilder;
    }

}
