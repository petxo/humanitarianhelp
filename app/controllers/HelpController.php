<?php

namespace App\Controllers;

class HelpController {
   protected $ci;
   //Constructor
   public function __construct(\Slim\Container $ci) {
       $this->ci = $ci;
       $this->logger = $this->ci['logger'];
   }
   
   public function byCountry($request, $response, $args) {
        //your code
        //to access items in the container... $this->ci->get('');
        $name = $request->getAttribute('pais');
        $data = array('name' => $name, 'age' => 40);
        $this->logger->addInfo("Something interesting happened");
        $response->withHeader('Content-type', 'application/json');
        return $response->withJson($data);
   }
}
