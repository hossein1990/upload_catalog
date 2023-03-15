<?php
namespace Hossein\Task1\services;
class XmlToJsonService implements InterfaceService
{
   public  function action($xml)
   {
   try {
       $xmldata = simplexml_load_string($xml  );
       $jsondata = json_encode($xmldata);
      return $jsondata;
      }
      catch(Exception $e) {
         throw new Exception("Error in conver xml to json");
       }
   }
}
 