<?php
namespace Hossein\Task1\requests;
class Requests 
{
    public function typeFile($file,array $validateTypes)
    {
        $currentType=$file['type'];
        if(!in_array($currentType,$validateTypes))
             return "file type is invalid";
    }
    
}