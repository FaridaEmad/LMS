<?php

class Answer
{
    private $answerId;
    private $answerContent;
    private $flag;
    private $question_id;

    public function setanswerId($answerId){
        $this->answerId=$answerId;
      }
      
     public function getanswerId(){
      return $this->answerId;
     }
     
  
    public function getAnswerContent(){
     return $this->answerContent;
    }
    public function setAnswerContent($answerContent){
      $this->answerContent = $answerContent;
  }
    public function setflag($flag){
        $this->flag=$flag;
      }
      
     public function getflag(){
      return $this->flag;
     }

     public function setquestion_id($question_id){
        $this->question_id=$question_id;
      }
      
     public function getquestion_id(){
      return $this->question_id;
     }


}


?>