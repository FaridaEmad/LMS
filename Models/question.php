<?php

class Question
{
     private $questionId;
     private $questionContent;
     private $exam_id;


     public function setquestionId($questionId){
          $this->questionId=$questionId;
        }
        
       public function getquestionId(){
        return $this->questionId;
       }
       
       public function setquestionContent($questionContent){
         $this->questionContent=$questionContent;
       }
       
      public function getquestionContent(){
       return $this->questionContent;
      }
  
      public function setexam_id($exam_id){
          $this->exam_id=$exam_id;
        }
        
       public function getexam_id(){
        return $this->exam_id;
       }
  

  

}

?>