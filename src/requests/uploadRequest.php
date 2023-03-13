<?php
namespace Hossein\Task1\requests;
use Hossein\Task1\rules\ValidateCatalogFileJson;
use Hossein\Task1\rules\ValidateCatalogFileXml;
class uploadRequest extends Requests
{
    public function validation()
    {
        //this method validate file
        $file = $_FILES['catalog'];
        $validateTypes = array("application/json","application/xml") ;
        $result = $this->typeFile($file,$validateTypes);
        if(!is_null($result))
           return array("validate_type"=>$result ); 
        $currentType=$file['type'];
        if($currentType === "application/xml")
              $validateCatalogFile = new ValidateCatalogFileXml();
        else
              $validateCatalogFile = new ValidateCatalogFileJson();
        $result = $validateCatalogFile->rule($file);
        if(!is_null($result))
                 return array("validate_content"=> $result);
        return null;
    }

}