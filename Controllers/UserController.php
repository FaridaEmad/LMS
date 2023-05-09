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
            $userName = $user->getuserName();
            $email = $user->getemail();
            $password = $user->getpassword();
            $dept_id = $user->getdept_id();
            $role_id = $user->getrole_id();
            $query="insert into user values ('','$userName','$email','$password','$dept_id','$role_id')";
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
         /*public function update(User $user)
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
               }*/
               public function updatePassword(User $user)
         {
               $this->db=new DBController;
               if($this->db->openConnection())
               {
                  $password = $user->getpassword();
                  $userId = $user->getuserId();
                  $query="update user  SET password = $password where userId = $userId";
                  return $this->db->update($query);
               }
               else
               {
                  echo "Error in Database Connection";
                  return false; 
               }
            }
            public function updateName(User $user)
            {
                  $this->db=new DBController;
                  if($this->db->openConnection())
                  {
                     $userName = $user->getuserName();
                     $userId = $user->getuserId();
                     $query="update user  SET userName = \"$userName\" where userId = $userId";
                     return $this->db->update($query);
                  }
                  else
                  {
                     echo "Error in Database Connection";
                     return false; 
                  }
               }
           
         } 

      
?>