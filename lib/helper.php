<?php

use function PHPSTORM_META\argumentsSet;

class helper{
    //public static function redirectWait(string $page,int $sec){
     //  header("Referch: $sec; url={$page}.php");
   // }

  public static function __callStatic($name, $arguments)
  {
      if($name=="redirect"){
          if(count($arguments) >1){
           header("Refresh: $arguments[0]; url={$arguments[1]}.php");
          }else{
           header("location: $arguments[0].php");
          }
      }
  }

}

?>