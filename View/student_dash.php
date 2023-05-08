<?php
 session_start();
 if(!isset($_SESSION["userRole"]))
 {
     header("location:../index.php");
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
                    <a href="student_dash.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                  
                    <a href="view courses_student.php" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>view subject </a>
                    <a href="" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>view course</a>
                    <a href="enroll_subject.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>enroll subject</a>
                    <a href="enroll_subject.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>enroll course</a>
                    <a href="student_exam.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Take Exam</a>
                    <a href="stud_viewgrade.php" class="nav-item nav-link "><i class="far fa-file-alt me-2"></i>Grade</a>
                    
                   
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
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" href="../index.php?Log Out">
                            <a href="editProfile.php" class="dropdown-item">My Profile</a>
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

            <!-- Blank Start -->
            <
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-10 text-center">
                        <div class="dash">
                            <div class="row rounded m-3">
                                <div class="col-4 rounded">
                                    <a href="stud_viewgrade.php">
                                        <div class="bg-warning p-4">
                                            <h3 class="text-light">View Grade</h3>
                                        </div>
                                        </a>
                                </div>
                                <div class="col-4 rounded">
                                    <a href="student_correct.php">
                                        <div class="bg-info p-4">
                                            <h3 class="text-light">Correct</h3>
                                        </div>
                                        </a>
                                </div>
                                <div class="col-4 rounded">
                                    <a href="student_exam.php">
                                        <div class="bg-danger p-4">
                                            <h3 class="text-light">Exam</h3>
                                        </div>
                                        </a>
                                </div>
                            </div>
                            <div class="row rounded m-3">
                                <div class="col-4 rounded">
                                    <a href="student_takeExam.php">
                                        <div class="bg-primary p-4">
                                            <h3 class="text-light">Take Exam</h3>
                                        </div>
                                        </a>
                                </div>
                                <div class="col-4 rounded">
                                    <a href="trackingPerformance.php">
                                        <div class="bg-success p-4">
                                            <h3 class="text-light">Track Performance</h3>
                                        </div>
                                        </a>
                                </div>
                                <div class="col-4 rounded">
                                    <a href="view courses_student.php">
                                        <div class="bg-secondary p-4">
                                            <h3 class="text-light">View Course</h3>
                                        </div>
                                        </a>
                                </div>
                                
                              
                            </div>
                        </div>
                        
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