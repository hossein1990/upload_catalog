<?php
namespace Hossein\Task1\services;
class XmlToJsonService implements InterfaceService
{
   public  function action($xml)
   {
    
    $xmldata = simplexml_load_string($xml  );
    $jsondata = json_encode($xmldata);
    return $jsondata;
   }
}
 