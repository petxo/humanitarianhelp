<?php

namespace App\Controllers;

use \App\Domain\Factories\HumanitarianHelpServiceFactory;

class HelpController {
   protected $ci;

   private $_service;

   //Constructor
   public function __construct(\Slim\Container $ci) {
       $this->ci = $ci;
       $this->_service = HumanitarianHelpServiceFactory::createFromIati();
   }

   public function byCountry($request, $response, $args) {
        $country = $request->getAttribute('pais');
        $data = $this->_service->getAggregate($country);
        $response->withHeader('Content-type', 'application/json');
        return $response->withJson($data);
   }
}
