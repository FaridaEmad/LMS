<?php


require_once '../Models/course.php';
require_once '../Controllers/DBController.php';
class CourseController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection


    public function getCourse()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from course";
            return $this->db->select($query);
         }

         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getCourseStudent()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select courseId ,courseName from user_course";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function addCourse(Course $course)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="insert into course values ('','$course->courseName','$course->coursePrerequisite_id','$course->coursePrerequisite','$course->user_id')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection ";
            return false; 
         }
      }
      public function enroll_course(Course $course )
      {
           $this->db=new DBController;
           if($this->db->openConnection())
           {
              $query="insert into user_course  values ('','$course->user_id','$course->courseId','$course->courseName','$course->coursePrerequisite_id') ";
              return $this->db->insert($query);
           }
           else
           {
              echo "Error in Database Connection ";
              return false; 
           }
        } 
  
    public function deletetCourse($courseId)
    {
       $this->db=new DBController;
       if($this->db->openConnection())
       {
          $query= "delete from course where courseId = $courseId";
          return $this->db->delete($query);
       }
       else
       {
          echo "Error in Database Connection";
          return false; 
       }
    }
    public function deletetCourseStudent ($courseId)
    {
       $this->db=new DBController;
       if($this->db->openConnection())
       {
          $query= "delete from user_course where courseId = $courseId";
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