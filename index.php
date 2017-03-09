<?php
require 'vendor/autoload.php';
//environment variables
define('DEBUG', true);

//app constants
define('VIEW_DIRECTORY','webapp/views/');
define('META_TITLE_PREFIX','My Store | ');

//slim config
$config = [];
if (DEBUG === true){
    $config['settings'] = [
        'displayErrorDetails' => true
    ];
}

//http compression
$config['cache'] = function () {
    return new \Slim\HttpCache\CacheProvider();
};

//create slim app
$app = new \Slim\App($config);

//caching
//$app->add(new \Slim\HttpCache\Cache('public', 86400));

//get slim container
$container = $app->getContainer();

$container['cache'] = function () {
    return new \Slim\HttpCache\CacheProvider();
};

//register view system with slim
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(VIEW_DIRECTORY, [
//        'cache' => 'webapp/public/cache'
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

//load bootstrapper
include_once('app/services/bootstrapper.php');

$app->run();