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
    public function getCourseStudent($user_id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT course_id , course.courseName FROM user_course JOIN course on course_id = courseId WHERE user_course.user_id = $user_id";
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
            $courseName = $course->getcourseName();
            $coursePre_id = NULL;
            $coursePre_id = $course->getcoursePrerequisite_id();
            $user_id = $course->getuser_id();
            $query="insert into course values ('','$courseName','$coursePre_id','$user_id')";
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
            $user_id = $course->getuser_id();
            $courseId = $course->getcourseId();
              $query="insert into user_course  values ('','$user_id','$courseId') ";
              return $this->db->insert($query);
           }
           else
           {
              echo "Error in Database Connection ";
              return false; 
           }
        } 
      public function getPre($courseId)
      {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select coursePrerequisiteId from course where courseId = $courseId";
              return $this->db->select($query);
           }
           else
           {
              echo "Error in Database Connection ";
              return false; 
           }
      }

      public function getMycourses($user_id)
      {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select course_id from user_course where user_id = $user_id ";
              return $this->db->select($query);
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
          $query= "delete from user_course where course_id = $courseId";
          return $this->db->delete($query);
       }
       else
       {
          echo "Error in Database Connection";
          return false; 
       }
    }
    
    public function search($search)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from course where courseName LIKE '%$search%'";
            return $this->db->select($query);
         }

         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
 }
   
 ?>