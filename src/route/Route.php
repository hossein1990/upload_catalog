<?php
namespace Hossein\Task1\route;

class Route 
{
   public function notFound( string $message="page not found"):void
   {
    http_response_code(404);
    echo  json_encode(["message"=>$message]);
    exit();
   } 
}