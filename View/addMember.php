<?php
 session_start();
 if(!isset($_SESSION["userRole"]))
 {
     header("location:../index.php");
 }

require_once '../Models/user.php';
require_once '../Controllers/AuthController2.php';
require_once '../Controllers/RoleController.php';
require_once '../Controllers/DeptController.php';
$RoleCont= new RoleController;
$DeptCont= new DeptController;
$roles = $RoleCont->getRoles();
$depts = $DeptCont->getDept();


   /* if(!isset($_SESSION["userId"]))
    {
        session_start();
    }*/
    $errMsg= "";
    $AddMsg="";

if( isset($_POST['name']) && isset($_POST['emailR']) && isset($_POST['passwordR']) &&  isset($_POST['roleR']) &&  isset($_POST['deptR']) )
{
    if(!empty($_POST['name'] )&& !empty($_POST['emailR'] )&& !empty($_POST['passwordR']) && !empty($_POST['roleR'] ) && !empty($_POST['deptR'] ))
    {
        $user = new User;
        $authController2 =new AuthController2;
        $user->setuserName($_POST['name']);
        $user->setemail($_POST['emailR']);
        $user->setpassword($_POST['passwordR']);
        $user->setrole_id($_POST['roleR']);
        $user->setdept_id($_POST['deptR']);
        if( $authController2->register($user))
        {
            $AddMsg="Added successfully";

           /* if($_SESSION["userRole"]=="Admin")
            {
                header("Location:View/admin_dash.php");
            }
            else if($_SESSION["userRole"]=="professsor")
            {
                header("Location:View/prof_dash.php");
            }
            else if($_SESSION["userRole"]=="co_teacher")
            {
                header("Location:View/ta_dash.php");
            }
            else
            {
                header("Location:View/student_dash.php");
            }*/
          
        }
        else
        {
            
            $errMsg= "You Have Entered Something Wrong";
        }
    }
    else
    {
        $errMsg="Please Fill All Fields";
    }
   
           
 
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LMS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
	

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="../index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-book" aria-hidden="true"></i>LMS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span><?php echo $_SESSION["userRole"]?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin_dash.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                  
              
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">

                        <h3>Add Member</h3>
                        
                        
                    <form  id="formAuthentication" class="mb_3"action="addMember.php" method="POST">
                     <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="userName" placeholder="Inter yiur name" name="name" autofocus>
                            <label for="floatingInput">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="emailR" autofocus>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="passwordR" aria-describedby="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div>
                        <div class="form-floating mb-4">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="roleR">
                                    <option selected disabled>Select Role</option>
                                    <?php
                                        foreach($roles as $role)
                                        {
                                        ?>
                                                    
                                                    <option value= "<?php echo $role["roleId"] ?>" > <?php echo $role["roleName"] ?></option>
                                        <?php
                                        }
                                        ?>
                        </select>


                        </div>
                        <div class="form-floating mb-4">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="deptR">
                                    <option selected disabled>Select Department</option>
                                    <?php
                                        foreach($depts as $dept)
                                        {
                                        ?>
                                                    
                                                    <option value= "<?php echo $dept["deptId"] ?>" > <?php echo $dept["deptName"] ?></option>
                                        <?php
                                        }
                                        ?>
                        </select>
                        

                        </div>
                        <div class="row mb-3">
                                    <span class="errMsg"><?php echo $errMsg; ?></span>

                                </div>

                                <button type="submit" class="btn btn-primary">Add</button>

                       
                     </div>
                    </form>
                    <div class="add">
                    <?php
                    echo $AddMsg;
                    ?>
                    </div>
                    

                </div>
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Learning Management System</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">FCAI Students</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>

