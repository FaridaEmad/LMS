<?php

class  Department
{
  private $deptId;

  private $deptName;

  public function setdeptId($deptId){
    $this->deptId=$deptId;
  }
  
 public function getdeptId(){
  return $this->deptId;
 }
 
 public function setdeptName($deptName){
   $this->deptName=$deptName;
 }
 
public function getdeptName(){
 return $this->deptName;
}

}



?>