<?php


class user extends DB{
    function getUserByEmailAndPassword($email,$password){
        return $this->select("*","user")->where("email","=",$email)->andWhere("password","=",$password)->getRow();
    }
}

?>