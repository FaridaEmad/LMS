<?php

    session_start();
    if(!isset($_SESSION["userRole"]))
    {
        header("location:../index.php");
    }
    else
    {
        if($_SESSION["userRole"] != "student")
        {
            header("location:../index.php");
        }
    }
    require_once '../Controllers/ExamController.php';
    require_once '../Models/exam.php';
    require_once '../Models/answer.php';
    require_once '../Controllers/AnswerController.php';
    require_once '../Models/question.php';
    require_once '../Controllers/QuestionController.php';

    $errMsq = "";

    
    $examController = new ExamController;
    $examId = $_POST["stex"]; 

    $examTime = $examController->getExamTime($examId);
    $examName = $examController->getExamName($examId);
    $questions = new QuestionController;

    $questions = $questions->getQuestion($examId);
    $grades = 0;

    /*if(isset($_POST["subAns"]))
    {
        foreach($questions as $question)
        {
            $grades = $grades + $_POST[$answer["question_id"]];
        }
        $grade = new Grade;
        $gradeCon = new GradeController;
        $grade->user_id = $_SESSION["userId"];
        $grade->exam_id = $examId;
        $grade->studentGrade = $grades;
        if($gradeCon->addGrade($grade))
        {
            header("location: student_dash.php");
        }
        else
        {
            $errMsq = $_SESSION["errMsg"];
        }
    }
    else
    {

    }*/
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

    <!--Timer stylesheet-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../lib/count/inc/TimeCircles.js"></script>
    <link href="../lib/count/inc/TimeCircles.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <style>
        .owl-nav {
    position: relative;
}

.owl-carousel .owl-nav .owl-prev {
    position: absolute;
    left: 0;
    background-color: #009cff;
    border-radius: 10px;
    padding: 5px;
    color: black;
    font-weight: 500;
}

.owl-carousel .owl-nav .owl-next {
    position: absolute;
    right: 0;
    background-color: #009cff;
    border-radius: 10px;
    padding: 5px;
    color: black;
    font-weight: 500;
}

.exam-timer {
    max-width: 400px;
    width: 100%;
    height: 200px;
}

.sbtn{
    width: auto;
}
    </style>
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
                    
                    <a href="student_exam.php" class="nav-item nav-link active"><i class="far fa-file-alt me-2"></i>Exams</a>
                    <a href="stud_viewgrade.php" class="nav-item nav-link active"><i class="far fa-file-alt me-2"></i>Grade</a>
                   
                  
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
                    <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="row">
                            <h3 class="mb-4"></h3>
                            <div class="d-flex justify-content-between direction-row">
                                <h4><?php echo $examName[0]["examName"]?></h4>
                                <div class="exam-timer " data-timer="<?php echo $examTime[0]["examTime"]?>"></div>
                            </div>
                        </div>
                            <?php
                                if(count($questions) == 0)
                                {
                                    ?>
                                    <div class="alert alert-danger" role="alert"> No Available Exams</div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                <form action="student_correct.php" method="POST" id="sbtForm">
                                    <div class="owl-carousel owl-theme" id="exam-car">
                                        <?php
                                        foreach($questions as $question)
                                        {
                                        ?>
                                            <div class="item">
                                                <div class="row text-dark p-3">
                                                    <h4><?php echo $question["questionContent"] ?></h4>
                                                </div>
                                                <?php
                                                    $answers = new AnswerController;
                                                    $answers = $answers->getAnswer( $question["questionId"]);
                                                    foreach($answers as $answer)
                                                    {
                                                        ?>
                                                        <label>
                                                        <input type="radio" name="<?php echo $answer["question_id"] ?>" value="<?php echo $answer["flag"] ?>"><h6> <?php echo $answer["answerContent"];?></h6>
                                                        </label>
                                                        <br>
                                                        <?php 
                                                    }
                                                ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        
                                    </div>
                                    <?php
                                }
                            ?>
                            <div class="row p-4 d-flex justify-content-center">
                                <input type="hidden" name="stex2" value="<?php echo $examId ?>">
                                <div class="row d-flex justify-content-center"></div>
                                <input type="submit" value="Submit" name="subAns" class="btn btn-primary sbtn" >
                            </div>
                            </form>
                            <?php
                            
                            ?>
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
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../lib/count/inc/TimeCircles.js"></script>
    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

    <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

function submitAnswers()
{
    document.getElementById("sbtForm").submit();
}

$(".exam-timer").TimeCircles({
    circle_bg_color: "#fff",
    time: {
        Days: { show: false },
        Hours: { color: "#009cff" },
        Minutes: { color: "#009cff" },
        Seconds: { color: "#009cff" }
    },
    count_past_zero : false

});

function endTime(){
    var remainingTime = $(".exam-timer").TimeCircles().getTime();
    timer = setInterval(function(){
    remaining_time = $(".exam-timer").TimeCircles().getTime();
    remainingTime = remaining_time;
    console.log(remainingTime);
    if(remainingTime < 1){
        clearInterval(timer);
        alert('Exam is over!!!');
        submitAnswers();
    }
    },1000);
}

endTime();

/*setInterval(function(){
    
    
    {
        alert('Exam is over!!!');
        submitAnswers();
        clearInterval();
    }
},1000)*/
    </script>
    
</body>
</html>