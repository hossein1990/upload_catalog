<?php
declare(strict_types=1);
require   "./vendor/autoload.php";
use Hossein\Task1\route\Api;
header("Content-type: application/json; charset=UTF-8");
$parts = explode("/", $_SERVER["REQUEST_URI"]);
$apiclass = new Api;
if($parts[2] !="upload" || $_SERVER['REQUEST_METHOD'] !== 'POST')
{
    $apiclass->notFound("page not found!!!");
   
}
$reciveFile = $_FILES['catalog'];
$apiclass->uploadCatalog($reciveFile );