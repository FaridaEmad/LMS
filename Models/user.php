<?php

class User
{
  private $userId;
  private $userName;
  private $email;
  private $password;
  private $dept_id;
  private $role_id; 


  public function setuserId($userId){
    $this->userId=$userId;
  }
  
 public function getuserId(){
  return $this->userId;
 }

 /**start user name */
 
 public function setuserName($userName){
   $this->userName=$userName;
 }
 
public function getuserName(){
 return $this->userName;
}

/**start email */
public function setemail($email){
  $this->email=$email;
}

public function getemail(){
return $this->email;
}

/**start pass */
public function setpassword($password){
  $this->password=$password;
}

public function getpassword(){
return $this->password;
}

/**start deptid */
public function setdept_id($dept_id){
  $this->dept_id=$dept_id;
}

public function getdept_id(){
return $this->dept_id;
}

/**start roleid */
public function setrole_id($role_id){
  $this->role_id=$role_id;
}

public function getrole_id(){
return $this->role_id;
}



}

?>