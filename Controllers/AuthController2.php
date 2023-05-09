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
            $query="insert into user values ('','$user->userName','$user->email','$user->password','$user->dept_id','$user->role_id')";
            $result=$this->db->insert($query);
            if($result!=false)
            {
                session_start();
                $_SESSION["userId"]=$result;
                $_SESSION["userName"]=$user->userName;
                $_SESSION["userPassword"]=$user->password;
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

