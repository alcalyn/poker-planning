<?php

namespace App;

use Pimple\ServiceProviderInterface;
use Pimple\Container;
use App\Converter\TeamConverter;
use App\Converter\UserConverter;
use App\Event\UserEvent;
use App\Event\TeamEvent;

class HelloRestApiProvider implements ServiceProviderInterface
{
    /**
     * {@InheritDoc}
     */
    public function register(Container $app)
    {
        $app['app.converter.team'] = function () use ($app) {
            return new TeamConverter($app['orm.em']->getRepository('App:Team'));
        };

        $app['app.converter.user'] = function () use ($app) {
            return new UserConverter($app['orm.em']->getRepository('App:User'));
        };

        $app->forwardEventsToPushServer([
            UserEvent::JOINED,
            UserEvent::VOTED,
            TeamEvent::CREATED,
        ]);
    }
}
