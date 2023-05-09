<?php
require_once '../Models/role.php';
require_once '../Controllers/DBController.php';
class DeptController
{
    
   
    
        protected $db;
        public function getDept()
        {
              $this->db=new DBController;
              if($this->db->openConnection())
              {
                 $query="SELECT * FROM department";
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