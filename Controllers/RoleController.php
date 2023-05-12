<?php
require_once '../Models/role.php';
require_once '../Controllers/DBController.php';
class RoleController

{
    protected $db;
    public function getRoles()
    {
          $this->db=new DBController;
          if($this->db->openConnection())
          {
             $query="SELECT * FROM role";
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