<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

use App\models\template;

class templateController{
    protected $c;
    public function __construct(ContainerInterface $container){
        $this->c = $container;
    }
    public function index(Request $request, Response $response){
        $data = template::all();
        $response->getBody()->write(json_encode($data[0]));
        return $response;
    }
}