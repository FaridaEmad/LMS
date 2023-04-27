<?php

require_once '../Models/answer.php';
require_once '../Controllers/DBController.php';
class AnswerController
{
   protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
   public function getAnswer($qesId)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="select * from answer where question_id = $qesId";
         return $this->db->select($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
   }


   public function addAnswer(Answer $answer)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="insert into answer values ('','$answer->answerContent','$answer->flag','$answer->question_id')";
         return $this->db->insert($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
   }
   
      /* public function deletetAnswer( $answerId)
         {
            $this->db=new DBController;
            if($this->db->openConnection())
            {
               $query="delete from answer where answerId = "$answerId";
               return $this->db->delete($query);
            }
            else
            {
               echo " Error in Database Connection";
               return false; 
            }
            }
         }*/
   public function deletetAnswer( $answerId)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="delete from answer where id = $answerId";
         return $this->db->delete($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
   }
} 
?>