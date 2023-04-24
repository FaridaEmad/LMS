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
                    if($result[0]["role_id"]==1)
                    {
                        $_SESSION["userRole"]="Admin";
                    }
                    elseif($result[1]["role_id"]==2)
                    {
                        $_SESSION["userRole"]="professsor";
                    }
                    elseif($result[2]["role_id"]==3)
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
    public function register(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query="insert into users values ('','$user->userName','$user->email','$user->password',1,1)";
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