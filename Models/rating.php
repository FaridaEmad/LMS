<?php

class Rating
{
    private $ratingId;
    private $user_id;
    private $ratingValue;

    public function setratingId($ratingId){
        $this->ratingId=$ratingId;
      }
      
     public function getratingId(){
      return $this->ratingId;
     }
     
     public function setuser_id($user_id){
       $this->user_id=$user_id;
     }
     
    public function getuser_id(){
     return $this->user_id;
    }

    public function setratingValue($ratingValue){
        $this->ratingValue=$ratingValue;
      }
      
     public function getratingValue(){
      return $this->ratingValue;
     }

  
   
}

?>