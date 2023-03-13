<?php
namespace Hossein\Task1\requests;
class uploadRequest extends Requests
{
    public function validation()
    {
        //this method validate file
        $file = $_FILES['catalog'];
        $validateTypes = array("application/json","application/xml") ;
        $response["validate_type"] = $this->typeFile($file,$validateTypes);
        

    }

}