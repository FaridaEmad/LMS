<?php


require_once '../Models/grade.php';
require_once '../Controllers/DBController.php';
class GradeController
{
   protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection


   public function getGrade()
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from grade ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }


   public function addGrade(Grade $grade)
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="insert into grade values ('','$grade->exam_id','$grade->user_id','$grade->studentGrade')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }
   public function deletetGrade($gradeId)
   {
      $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query= "delete from grade where gradeId = $gradeId";
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