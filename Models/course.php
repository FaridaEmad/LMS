<?php

class Course
{
 private $courseId;
 private $courseName;
 private $user_id;
 private $coursePrerequisite_id;
 


 public function setcourseId($courseId){
    $this->courseId=$courseId;
  }
  
 public function getcourseId(){
  return $this->courseId;
 }
 
 public function setcourseName($courseName){
   $this->courseName=$courseName;
 }
 
public function getcourseName(){
 return $this->courseName;
}

 public function setuser_id($user_id){
    $this->user_id=$user_id;
  }
  
 public function getuser_id(){
  return $this->user_id;
 }

 public function setcoursePrerequisite_id($coursePrerequisite_id){
    $this->coursePrerequisite_id=$coursePrerequisite_id;
  }
  
 public function getcoursePrerequisite_id(){
  return $this->coursePrerequisite_id;
 }




}

?>