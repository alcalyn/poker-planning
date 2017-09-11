<?php

namespace App;

use Pimple\ServiceProviderInterface;
use Pimple\Container;
use App\Service\PokerPlanning;

class HelloProvider implements ServiceProviderInterface
{
    /**
     * {@InheritDoc}
     */
    public function register(Container $app)
    {
        $app->extend('doctrine.mappings', function ($mappings, $app) {
            $mappings []= [
                'type' => 'yml',
                'namespace' => 'App\\Entity',
                'path' => $app['project.root'].'/src/App/Resources/doctrine',
                'alias' => 'App',
            ];

            return $mappings;
        });

        $app['serializer.builder']
            ->addMetadataDir($app['project.root'].'/src/App/Resources/serializer')
        ;

        $app['app.poker_planning'] = function () {
            return new PokerPlanning();
        };
    }
}
