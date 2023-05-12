<?php

class Role
{
 private $roleId;
 private $roleName;

 public function setroleId($roleId){
    $this->roleId=$roleId;
  }
  
 public function getroleId(){
  return $this->roleId;
 }
 
 public function setdeptName($roleName){
   $this->roleName=$roleName;
 }
 
public function getroleName(){
 return $this->roleName;
}

}

?>