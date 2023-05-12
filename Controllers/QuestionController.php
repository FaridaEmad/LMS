<?php


require_once '../Models/question.php';
require_once '../Controllers/DBController.php';
class QuestionController
{
   protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
   public function getQuestion($exam)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="select * from question where exam_id = $exam";
         return $this->db->select($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
   }

   public function getQuestionContent($userId)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="select questionId , examName , questionContent from question join exam on examId = exam_id where user_id = $userId order by examId";
         return $this->db->select($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
   }


   public function addQuestion(Question $question)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $content = $question->getquestionContent();
         $exam_id = $question->getexam_id();
         $query="insert into question values ('','$content','$exam_id')";
         return $this->db->insert($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
   }
   
   public function deletetQuestion( $questionId)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="delete from question where questionId = $questionId";
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