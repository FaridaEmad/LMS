<?php
session_start();

   /* if($_SESSION["userRole"]!="admin")
    {
        header("location:../index.php");
    }*/


require_once '../Models/course.php';
require_once '../Controllers/CourseController.php';
$errMsg="";
$AddMsg="";
//$coursePres=$courseCont->getPre();


  
if(isset($_POST["courseNameA"]) && isset($_POST["coursePrerequisite_idA"]) && isset($_POST["user_idA"])&& isset($_POST["Add"]))
 {
    if(!empty($_POST["courseNameA"] ) && !empty($_POST["coursePrerequisite_idA"]) && !empty($_POST["user_idA"]))
    {
      $course=new Course;
      $courseCont=new CourseController;
      $course->setcourseName($_POST["courseNameA"]);
      $course->setcoursePrerequisite_id($_POST["coursePrerequisite_idA"]);
      $course->setuser_id($_POST["user_idA"]);
      if($courseCont->addCourse($course))
      {
        $AddMsg="Added successfully";

       
      }
      else{
        $errmsg="failed addition";
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
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                 
                    <a href="add_course.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>add course</a>
                    <a href="view_courses_admin.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>view courses</a>
                   
                 
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
                            <a class="dropdown-item" href="../index.php?Log Out">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>   
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                           
                            <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">new course</h6>
                            
                            <?php

if ($errMsg != "") {
?>
    <div class="alert alert-danger" role="alert"><?php echo $errMsg ?></div>
<?php
}

?>
                         
                                  
                            <form action="add_course.php" method="POST">
                                <div class="mb-3">
                                    <label for="courseName" class="form-label">courseName</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="courseNameA">
                                </div>
                                <div class="mb-3">
                                <label for="coursePrerequisite_id" class="form-label">coursePrerequisite Id</label>
                                    <input type="text" class="form-control" id="exampleInputcourseID"
                                        aria-describedby="emailHelp" name="coursePrerequisite_idA">
                                </div>
                                <div class="mb-3">
                                    <label for="courseID" class="form-label">user id</label>
                                    <input type="text" class="form-control" id="exampleInputcourseID"
                                        aria-describedby="emailHelp" name="user_idA">
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else. -->
                                    <!-- </div> -->
                                </div>
                                </div>
                                 </div>
                        
                                    <div>
                                      <button type= "submit" name="Add" class="btn btn-primary">Add</button>
                                  </div>
                                                
                            </form>
                     <div class="add">   
                    <?php
                    echo $AddMsg;
                    ?>
                    </div>
                        </div>
                    </div> </div>
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
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>