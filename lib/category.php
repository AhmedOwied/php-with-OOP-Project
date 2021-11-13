<?php


class category extends DB{

    function addNewCategory($data){
        $result = $this->insert("category",$data)->excu();
        return $result;
    }

    function getCategoryList(){
        return $this->select("*","category")->getAll();
    }

    function deletecategory($id){
        return $this->delete("category")->where("id","=",$id)->excu();
    }

    function getcategorybyid($id){
        return $this->select("*","category")->where("id","=",$id)->getRow();

    }

    function updatecategory($id,$data){
        return $this->update("category",$data)->where("id","=",$id)->excu();
    }




}




?>