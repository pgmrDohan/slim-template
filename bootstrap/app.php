<?php
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';
$container = new Container();

AppFactory::setContainer($container);
AppFactory::setSlimHttpDecoratorsAutomaticDetection(false);
ServerRequestCreatorFactory::setSlimHttpDecoratorsAutomaticDetection(false);

$app = AppFactory::create();

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);