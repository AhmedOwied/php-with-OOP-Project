<?php

class Validation{
    public static function string_Empty($input){
       $input= trim($input," ");
       $input =(strlen($input) == 0)?true:false;
       return $input;
    } 
}


?>