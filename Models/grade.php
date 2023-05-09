<?php

class Grade
{
    private $gradeId ;
    private $exam_id;
    private $user_id;
    private $studentGrade;

    /***start one */
    public function setgradeId ($gradeId ){
        $this->gradeId =$gradeId ;
      }
      
     public function getgradeId (){
      return $this->gradeId;
     }
     
     /***start 2 */
     public function setexam_id($exam_id){
       $this->exam_id=$exam_id;
     }
     
    public function getexam_id(){
     return $this->exam_id;
    }

    /***start 3 */
    public function setuser_id($user_id){
        $this->user_id=$user_id;
      }
      
     public function getruser_id(){
      return $this->user_id;
     }

        /***start 4 */
    public function setstudentGrade($studentGrade){
        $this->studentGrade=$studentGrade;
      }
      
     public function getstudentGrade(){
      return $this->studentGrade;
     }
   
   
}

?>