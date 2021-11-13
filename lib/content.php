<?php

class content extends DB
{

    public function addNewContent($data){
        $result= $this->insert("content",$data)->excu();
        return $result;

    }
}


