<?php

class DB{

    public $connection;
    public $query;
    public $sql;

    public function __construct(){
        $this->connection = mysqli_connect("localhost","root","","cms");
    }

    public function select($column,$table_name){
        $this->sql= "SELECT $column FROM $table_name";
        //$this->query= mysqli_query($this->connection,"SELECT $column FROM `$table_name`  ");
        return $this;
    }

    public function where($column,$compair,$value){
        $this->sql .= " WHERE `$column` $compair '$value' ";
        return $this;
    }

    public function andWhere($column,$compair,$value){
        $this->sql .= " AND `$column` $compair '$value' ";
        return $this;
    }

    public function orWhere($column,$compair,$value){
        $this->sql .= " OR `$column` $compair '$value' ";
        return $this;
    }

    public function getAll(){
        $this->Query();
       // $this->query = mysqli_query($this->connection,$this->sql);
        while($row = mysqli_fetch_assoc($this->query)){
            $data[]=$row;
        }
        return $data;
    }
    
    public function getRow(){
        $this->Query();
        // $this->query = mysqli_query($this->connection,$this->sql);
        $row = mysqli_fetch_assoc($this->query);
        return $row;

    }

    public function insert($table_name,$data){
        $columns="";
        $values ="";
        foreach($data as $key => $value){
            $columns .=" `$key` ,";
            $values  .= $this->preparDate($value).",";   //Ternary Operator
        }

        $columns = rtrim($columns , ",");
        $values  = rtrim($values  , ",");

        $this->sql= "INSERT INTO `$table_name` ($columns) VALUES ($values) ";
        return $this;
        
    }

    public function excu(){
        $this->Query();
       //  $this->query = mysqli_query($this->connection,$this->sql);
         if(mysqli_affected_rows($this->connection) > 0){
             return True;
         }else{
             return False;
         }
    }

    public function update($table_name,$data){
        $columns="";
        foreach($data as $key => $value){
            $columns .= " `$key` = ".$this->preparDate($value).",";
        }
        $columns = rtrim($columns , ",");
        $this->sql= "UPDATE `$table_name` SET $columns ";

        return $this;
    }

    public function delete($table_name){
      $this->sql="DELETE FROM `$table_name` ";
      return $this;
    }


    public function preparDate($data){
        if(gettype($data) == 'string' ){
            return " '$data' ";
        }else{
            return " $data ";
        }
    }

    public function Query(){
        $this->query = mysqli_query($this->connection,$this->sql);
    }


    public function showError(){
      //  return mysqli_errno($this->connection);
      $errors= mysqli_error_list($this->connection);
      foreach($errors as $error){
        Echo $error['error'];
       }
    }

    // $errors= mysqli_error_list($this->connection);
    // foreach($errors as $error){
    //     Echo $error;

}



?>