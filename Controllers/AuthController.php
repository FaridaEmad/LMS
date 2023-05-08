<?php 
require_once 'Models/user.php';
require_once 'DBController.php';

class AuthController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    public function login(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query="select * from user where email='$user->email' and password ='$user->password'";
            $result=$this->db->select($query);
        
            if($result===false)
            {
                echo "Error in Query";
                return false;
            }
            else
            {
                if(count($result)==0)
                {
                    session_start();
                    $_SESSION["errMsg"]="You have entered wrong email or password";
                    $this->db->closeConnection();
                    return false;
                }
                else
                {
                    session_start();
                    $_SESSION["userId"]=$result[0]["userId"];
                    $_SESSION["userName"]=$result[0]["userName"];
                    $_SESSION["password"]=$result[0]["password"];
                    if($result[0]["role_id"]==1)
                    {
                        $_SESSION["userRole"]="Admin";
                    }
                    elseif($result[0]["role_id"]==2)
                    {
                        $_SESSION["userRole"]="professsor";
                    }
                    elseif($result[0]["role_id"]==3)
                    {
                        $_SESSION["userRole"]="co_teacher";
                    }
                    else
                    {
                        $_SESSION["userRole"]="student";
                    }
                    $this->db->closeConnection();
                    return true;
                }
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

