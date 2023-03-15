<?php 
declare(strict_types=1);
require   "./vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use  Hossein\Task1\services\XmlToJsonService;
final class XmlToJsonTest extends TestCase
{
    public function testXmlToJson(): void
    {
        $xmlToJsonService = new XmlToJsonService;
        $fileContent =  file_get_contents("../catalog.xml");
        $content =   $xmlToJsonService->action($fileContent);
        $this->assertNotEquals($content,"Error in conver xml to jso");
    }
}