<?php


require_once '../Models/exam.php';
require_once '../Controllers/DBController.php';
class ExamController
{
   protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection


   public function getExam($userId)
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from exam where user_id = $userId";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }


   public function addExam(Exam $exam)
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="insert into exam values ('','$exam->examName','$exam->examTime','$exam->user_id')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }
   public function deletetExam($examId)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query= "delete from exam where examId = $examId";
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