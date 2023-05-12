<?php


require_once '../Models/rating.php';
require_once '../Controllers/DBController.php';
class RatingController
{
   protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection


   public function getRating()
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select ratingId , userName , ratingValue from rating join user on userId = user_id";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }
   public function getRatingProf($id)
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select ratingId , userName , ratingValue from rating join user on userId = user_id where user_id = $id";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }
   public function getProf()
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select userId , userName from user where role_id = 2 or role_id = 3";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }
   public function addRating(Rating $rating)
   {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
           $user_id = $rating->getuser_id();
           $ratingValue = $rating->getratingValue();
           $query="insert into rating values ('','$user_id','$ratingValue')";
           return $this->db->insert($query);
        }
        else
        {
           echo "Error in Database Connection";
           return false; 
        }
    }
        public function deletetRating( $ratingId)
        {
             $this->db=new DBController;
             if($this->db->openConnection())
             {
                $query="delete from rating where ratingId = $ratingId";
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