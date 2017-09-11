<?php

ini_set('display_errors', 0);

require_once '../vendor/autoload.php';

$app = new RestApiApplication([
    'project.root' => dirname(__DIR__),
    'env' => 'prod',
]);

$app['http_cache']->run();
