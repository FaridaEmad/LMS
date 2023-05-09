<?php

class Exam
{
    private $examId;
    private $examName;
    private $examTime;
    private $user_id;



    public function setexamId($examId){
        $this->examId=$examId;
      }
      
     public function getexamId(){
      return $this->examId;
     }
     
     public function setexamName($examName){
       $this->examName=$examName;
     }
     
    public function getexamName(){
     return $this->examName;
    }

    public function setexamTime($examTime){
        $this->examTime=$examTime;
      }
      
     public function getexamTime(){
      return $this->examTime;
     }

     public function setuser_id($user_id){
        $this->user_id=$user_id;
      }
      
     public function getuser_id(){
      return $this->user_id;
     }

}

?>