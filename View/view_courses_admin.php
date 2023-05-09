<?php
 session_start();
 if(!isset($_SESSION["userRole"]))
 {
     header("location:../index.php");
 }
 require_once "../Models/University.php";
 $university = new University;
 $uniName = $university->getuniversity_name();

require_once '../Controllers/CourseController.php';
require_once '../Models/course.php';
require_once '../Models/user.php';
$course=new CourseController;
$deleteMsg = false;
if(isset($_POST["delete"]))
    {
        if(!empty($_POST["courseId"]))
        {
            $course->deletetCourse($_POST["courseId"]);
        }
    }
    if(isset($_post["searchBt"]) && isset($_POST["search"])){
        if(!empty($_post['search'])){
            $courses =$course->search($_POST["search"]);
        }
    }
    else
    {
        $courses=$course->getCourse();
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
            <div>
                    <h2><?php echo $uniName;?></h2>
                </div>
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
            <a class="binmjh" href="add_course.php" role="button"> <button type="button" class="btn btn-outline-primary m-2" >add course</button></a>
                <div class="bg-light rounded h-100 p-4">
                    courses list</div>
            <?php
            if (count($courses) == 0) {
            ?>
                <div class="alert alert-danger" role="alert">
                                there are no courses
                            </div> 
            <?php
            } else {

            ?>
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                <form method="post" action="view_course_searched.php">
                <div class="input-group m-3">
                    <input type="text" class="form-control" placeholder="Search ..." required name='search' aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="searchBt"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                </form>
                </div>
            </div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">coerseID</th>
                            <th scope="col">courseNAME</th>
                            <th scope="col">coursePrerequisiteId</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php
                        
                            foreach ($courses as $course) {
                            ?>                              
                            <tr>
                                <td scope="col"><?php echo $course["courseId"] ?></td>
                                <td scope="col"><?php echo $course["courseName"] ?></td>
                                <td scope="col"><?php echo $course["coursePrerequisiteId"] ?></td>
                                <td>  
                                    <form action="view_courses_admin.php" method="POST">
                                        <input type="hidden" name="courseId" value="<?php 
                                        echo $course["courseId"] ?>  "> 
                                        <button type="submit" name="delete" class="btn btn-outline-danger">
                                        <span class="tf-icons bx bx-trash"></span> delete
                                        </button>
                                    </form></td>
                            </tr>
                                    <?php
                                       }
                                     }
                                        ?>
                                </tbody>
                            </table>
                                </div>
                                         </div>
                                </table>
                            </div>
                        </div>


         


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