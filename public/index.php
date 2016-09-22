<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
include_once('./public/AutoLoader.php');
AutoLoader::registerDirectory('./app');

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['AyudaController'] = function ($c) {
	return new \App\Controllers\AyudaController($c);
};

$app->get('/ayudamonetaria/{pais}', 'HelpController:byCountry');
$app->run();
