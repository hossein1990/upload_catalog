<?php
declare(strict_types=1);
require   "./vendor/autoload.php";
use Hossein\Task1\route\Api;
header("Content-type: application/json; charset=UTF-8");
$parts = explode("/", $_SERVER["REQUEST_URI"]);
$apiclass = new Api;
if($parts[1] !="upload")
{
    $apiclass->notFound("page not found!!!");
   
}

echo "hossein";