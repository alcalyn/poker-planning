<?php

namespace App;

use Pimple\ServiceProviderInterface;
use Pimple\Container;
use App\Topic\TeamTopic;

class HelloWebsocketProvider implements ServiceProviderInterface
{
    /**
     * {@InheritDoc}
     */
    public function register(Container $app)
    {
        $app
            ->topic('teams/{teamId}', function ($topicPattern, $arguments) {
                $teamId = intval($arguments['teamId']);

                return new TeamTopic($topicPattern, $teamId);
            })
            ->assert('teamId', '\d+')
        ;
    }
}
