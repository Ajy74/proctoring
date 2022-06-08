<?php
$student=false;
$proctor=false;
$admin=false;
  session_start();
//for student
  if(!isset($_SESSION['Sloggedin']) || $_SESSION['Sloggedin']!=true){
   
  }
  else{
      $student=true;
     $name= $_SESSION['username'];

     include 'student/dbconnect.php';

     $sql= "SELECT * FROM `studentcred`";
     $result=mysqli_query($con,$sql);
    while($row= mysqli_fetch_assoc($result)){
        
        if($row['username']==$name){
            $s_id = $row['sno'];
        } 
    }

    $sql="SELECT * FROM `student_detail` where `student_detail`.`userno`='$s_id'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    
    if($num){        
            //for profile is created 

        while($row=mysqli_fetch_assoc($result)){
            $stud_name=$row['name'];
            $stud_name=strtoupper($stud_name);
            
            $imagepath='student/'.$row['img'];
            
            $profilePagePath='/proctoring/student/stu_MainProfile.php';
           
        }
    }
    else{
            //for profile not created

        $stud_name="STUDENT";
        $imagepath='/proctoring/image/user.png';
       
        $profilePagePath='/proctoring/student/stu_profile1.php';
    }

  }
//for proctor
 if(!isset($_SESSION['ploggedin']) || $_SESSION['ploggedin']!=true){
    
 }
 else{
    $proctor=true;
    $name= $_SESSION['username'];
 }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="/proctoring/css/dashstyle.css">


    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>
    CSIT DEPARTMENT
    </title>
</head>

<body >
<?php 

 

  if($student){

    echo '  <!-- navabar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!-- offcanvas trigger -->
            <button class="navbar-toggler me-2 " type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon " data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- offcanvas trigger -->
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">'.$stud_name.'</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="d-flex ms-auto" role="search">
                    <a href="/proctoring/logouthandler.php" ><button class="btn btnlogout    my-3 my-lg-0 text-uppercase" type="button">logout</button></a>
                </form>
            </div>
        </div>
    </nav>


    <!-- offcanvas -->

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark pt-3 pt-lg-0">
            <ul class="navbar-nav">
                <li>
                    <div>
                        <li >
                            <a href="#" class="nav-link px-3 active">
                                <span class="me-2 ">
                                    <!-- <i class="fa-duotone fa-gauge-simple-high"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-speedometer2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                        <path fill-rule="evenodd"
                                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                    </svg>
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="my-2">
                            <hr class="dropdown-divider"/>
                        </li>

                         <li >
                            <a href="'.$profilePagePath.'?userno='.$s_id.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-circle-user"></i>
                                </span>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li >
                            <a href="/proctoring/student/stu_query.php?s_id='.$s_id.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-clipboard-question"></i>
                                </span>
                                <span>Query</span>
                            </a>
                        </li>

                        <li >
                            <a href="#" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                                      </svg>
                                </span>
                                <span>Notice</span>
                            </a>
                        </li>

                        <li >
                            <a href="/proctoring/student/leave.php?s_id='.$s_id.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                      </svg>
                                </span>
                                <span>Application</span>
                            </a>
                        </li>
                        
                    </div>
                </li>

                <hr class="dropdown-divider"/>
                    <a href="#" class="nav-link px-3 active text-light">
                        <span class="me-2 ">
                            <img src=' .$imagepath. '   width="40" height="40"  class="rounded-circle border border-light" alt="";">
                        </span>
                        <span>' .$name. '</span>
                    </a>
                <hr class="dropdown-divider"/>
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas -->

<main class="mt-2 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 fw-bold fs-3">Dashboard</div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-dark bg-info mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h5 class="card-title">Info card title</h5>
                      <p class="card-text">Some quick example text to build on the 
                          card title and make up the bulk of the cards content.</p>
                    </div>
                </div>
            </div>
                        
        </div>
    </div>
</main>
';


  }
  elseif($proctor){
    echo '  <!-- navabar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!-- offcanvas trigger -->
            <button class="navbar-toggler me-2 " type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon " data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- offcanvas trigger -->
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">Proctor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto" role="search">
                    <a href="/proctoring/logouthandler.php" ><button class="btn btn-outline-success my-3 my-lg-0 text-uppercase" type="button">logout</button></a>
                </form>
            </div>
        </div>
    </nav>


    <!-- offcanvas -->

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark pt-3 pt-lg-0 ">
            <ul class="navbar-nav">
                <li>
                    <div>
                        <li >
                            <a href="#" class="nav-link px-3 active">
                                <span class="me-2 ">
                                    <!-- <i class="fa-duotone fa-gauge-simple-high"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-speedometer2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                        <path fill-rule="evenodd"
                                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                    </svg>
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="my-2">
                            <hr class="dropdown-divider"/>
                        </li>

                         <li >
                            <a href="#" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-circle-user"></i>
                                </span>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li >
                            <a href="/proctoring/proctor/respond_query.php" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-clipboard-question"></i>
                                </span>
                                <span>Queries</span>
                            </a>
                        </li>

                        <li >
                            <a href="/proctoring/proctor/pro_notice.php" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                                      </svg>
                                </span>
                                <span>Notice</span>
                            </a>
                        </li>

                        <li >
                            <a href="#" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                      </svg>
                                </span>
                                <span>Application</span>
                            </a>
                        </li>
                        
                    </div>
                </li>

                <hr class="dropdown-divider"/>
                    <a href="#" class="nav-link px-3 active text-light">
                        <span class="me-2 ">
                            <img src="https://source.unsplash.com/40x40/?nature,human"  width="40" height="40"  class="rounded-circle border border-light" alt="">
                        </span>
                        <span>' .$name. '</span>
                    </a>
                <hr class="dropdown-divider"/>
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas -->

<main class="mt-2 pt-3" >
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12 fw-bold fs-3">Dashboard</div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-dark bg-info mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h5 class="card-title">Info card title</h5>
                      <p class="card-text">Some quick example text to build on the 
                          card title and make up the bulk of the cards content.</p>
                    </div>
                </div>
            </div>
                        
        </div>
    </div>
</main>
';

  }
  else{
      echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark background  fixed-top">
      <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="gitalog.png" height="50px" width="200px" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon togbtn"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Contanct US</a>
            </li>
   -->
                  <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li> -->
                  <!-- <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li> -->
              </ul>
              <form class="d-flex">
                  <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
                  <!-- <button type="button" class="btn  btnsign mx-2">Sign Up</button> -->
                  <li class="nav-item dropdown btn  btnsign text-uppercase ">
                      <a class="nav-link dropdown hbtn" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Sign Up
                      </a>
                      <ul class="dropdown-menu my-2 color" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Admin</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="proctor/pro_signup.php">proctor</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="student/stu_signup.php">student</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown btn  btnlogin text-uppercase mx-2">
                      <a class="nav-link dropdown hbtn" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Login
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end my-2 color" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item " href="#">Admin</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="proctor/pro_login.php">proctor</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="student/stu_login.php">student</a></li>
                      </ul>
                  </li>
                  <!-- <button type="button" class="btn  btnlogin mx-2" >Login</button> -->

                  <!-- <button onclick="logout()" class="btnlogout">Logout</button> -->
              </form>
          </div>
      </div>
  </nav>
  

  <img src="/proctoring/css/mountain.jpeg" style="height:100vh; width:100vw;"  alt="image">

  <!-- footer -->
    <div class="container-fluid bg-dark text-light ">

        <p class="text-center mb-0 pt-4 pb-4">

            contact us :- 4657827648</br>
            social :- <i class="fa-brands fa-instagram"></i> <i class="fa-brands fa-facebook"> <i
                    class="fa-brands fa-twitter"></i></i> <i class="fa-brands fa-linkedin"></i>
                    

            </br></br>Copyright 2021 | All rights resrved
        </p>
    </div>
     <!-- footer -->
  ';
  }

?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script>
        function myFunction(){
            // window.location.href = "http://localhost/proctoring/"
            urlString = window.location.href;
            var url = new URL(urlString);
            var sprofile = url.searchParams.get("sprofile");
            
            // console.log(update)
            if(sprofile == 'true'){
                var x = document.getElementById("stu_profile");
                if (x.style.backgroundImage === "") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }else{
                if(fno == 'false'){
                    var x = document.getElementById("fav");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
                if(nick == 'false'){
                    var x = document.getElementById("nick");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
            }
        }

    </script>
</body>

</html>
