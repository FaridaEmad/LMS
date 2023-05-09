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
     return $this->answerContent;
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