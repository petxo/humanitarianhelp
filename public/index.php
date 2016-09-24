<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
include_once('./AutoLoader.php');
AutoLoader::registerDirectory('../app');

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['HelpController'] = function ($c) {
	return new \App\Controllers\HelpController($c);
};

$app->get('/ayudamonetaria/{pais}', 'HelpController:byCountry');
$app->run();
