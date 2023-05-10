<?php


require_once '../Models/rating.php';
require_once '../Controllers/DBController.php';
class RatingController
{
   protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection


   public function getRating($userId)
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select ratingId , user_id , ratingValue , ratingName from rating where user_id = $userId";
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
           $ratingId = $rating->getratingId();
           $user_id = $rating->getuser_id();
           $ratingValue = $rating->getratingValue();
           $ratingName = $rating->getratingName();
           $query="insert into rating values ('','$ratingId','$user_id','$ratingValue', '$ratingName')";
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