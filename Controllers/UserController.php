<?php

require_once '../Models/user.php';
require_once '../Controllers/DBController.php';
class UserController
{
   protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
   public function getUser()
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from user";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
   }


   public function addUser(User $user)
   {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="insert into user values ('','$user->userName','$user->email','$user->password','$user->dept_id','$user->role_id')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
      }
         public function deletetUser( $userId)
         {
               $this->db=new DBController;
               if($this->db->openConnection())
               {
                  $query="delete from user where userId = $userId";
                  return $this->db->delete($query);
               }
               else
               {
                  echo "Error in Database Connection";
                  return false; 
               }
         }
         public function update(User $user)
         {
               $this->db=new DBController;
               if($this->db->openConnection())
               {
                  $query="update into user values where userId= ?('$user->userName','$user->email','$user->password','$user->dept_id','$user->role_id')";
                  return $this->db->update($query);
               }
               else
               {
                  echo "Error in Database Connection";
                  return false; 
               }
               function update(User $user)
         {$this->db=new DBController;
               if($this->db->openConnection())
               {
                  $query="update into user values where userId= ?('$user->role_id')";
                  return $this->db->update($query);
               }
               else
               {
                  echo "Error in Database Connection";
                  return false; 
               }
            }
         } }
      
?>