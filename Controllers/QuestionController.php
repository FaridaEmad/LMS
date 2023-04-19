<?php


require_once '../../Models/question.php';
require_once '../../Controllers/DBController.php';
class QuestionController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    public function getQuestion()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from question";
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
            $query="insert into question values ('','$question->questionContent','$question->exam_id')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    
         public function deletetQuestion( $questionId)
         {
              $this->db=new DBController;
              if($this->db->openConnection())
              {
                 $query="delete from question where questionId = "$questionId";
                 return $this->db->delete($query);
              }
              else
              {
                 echo "Error in Database Connection";
                 return false; 
              }
         }
        }
    }