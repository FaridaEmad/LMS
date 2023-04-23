<?php


require_once '../Models/lecture.php';
require_once '../Controllers/DBController.php';
class LectureController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    public function getLecture()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from lecture";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }


    public function addLecture(Lecture $lecture)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="insert into lecture values ('','$lecture->lectureNumber','$lecture->lectureTitle','$lecture->course_id')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
     }
         public function deletetLecture( $lectureId)
         {
              $this->db=new DBController;
              if($this->db->openConnection())
              {
                 $query="delete from answer where lectureId = $lectureId";
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