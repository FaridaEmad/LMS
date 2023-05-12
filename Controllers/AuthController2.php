<?php 
require_once '../Models/user.php';
require_once 'DBController.php';

class AuthController2
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection

    public function register(User $user)
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
            $result=$this->db->insert($query);
            if($result!=false)
            {
               // session_start();
              // $_SESSION["userId"]=$result;
               //$_SESSION["userName"]=$user->getuserName();
              // $_SESSION["userPassword"]=$user->getpassword();
               // $_SESSION["userRole"]="Client";
              //    $_SESSION["userRole"]="Client";
                $this->db->closeConnection();
                return true;
            }
            else
            {
                $_SESSION["errMsg"]="Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    
}

?>

