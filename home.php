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
        // echo $name;
        // echo $row['username'];
    }

  

    $sql="SELECT * FROM `student_detail` where `student_detail`.`userno`='$s_id' and `status`= 1";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    
    if($num){        
            //for profile is created 
            // and also profile approved by admin

        $use_dashboard = true;    

        while($row=mysqli_fetch_assoc($result)){
            $stud_name=$row['name'];
            $dept=$row['branch'];
            $grp=$row['grp'];
            $stud_name=strtoupper($stud_name);
            
            $imagepath='student/'.$row['img'];
            
            $profilePagePath='/proctoring/student/stu_MainProfile.php';
            $qlink ="/proctoring/student/stu_query.php?s_id=".$s_id;
            $nlink = "/proctoring/student/view_notice.php?s_id=".$s_id;
            $alink = "/proctoring/student/leave.php?s_id=".$s_id;
            
            $sql1 = "SELECT * FROM `proctor_detail` where `for_branch`= '$dept' and `grp`= $grp";
            $res1 = mysqli_query($con,$sql1);
            $num1 = mysqli_num_rows($res1);

            if($num1 ==1){
                $row1 = mysqli_fetch_assoc($res1);

                $img = $row1['img'];
                
                $pro_name = $row1['name'];
                $pro_imagepath= '/proctoring/proctor/image/'.$img;
                $pro_contact= $row1['contact'];
                $pro_gmail= $row1['gmail'];
            }

           
        }
    }
    else{
            //for profile not created

        $use_dashboard = false;        

        $stud_name="STUDENT";
        $imagepath='/proctoring/image/user.png';
       
        $profilePagePath='/proctoring/student/stu_profile1.php';
        $qlink = "#";
        $nlink = "#";
        $alink = "#";

        $pro_name = '__';
        $pro_imagepath= '/proctoring/image/user.png';
        $pro_contact= "__";
        $pro_gmail= "__";
    }

  }
//for proctor
 if(!isset($_SESSION['ploggedin']) || $_SESSION['ploggedin']!=true){
    
 }
 else{
    $proctor=true;
    $name= $_SESSION['username'];


    include 'proctor/dbconnect.php';

     $sql= "SELECT * FROM `proctorcred`";
     $result=mysqli_query($con,$sql);
    while($row= mysqli_fetch_assoc($result)){
        
        if($row['username']==$name){
            $p_id = $row['sno'];
        } 

        $sql="SELECT * FROM `proctor_detail` where `proctor_detail`.`userno`='$p_id' and `status`= 1";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);

        if($num){        
            //for profile is created 
            // and also profile approved by admin

            $use_dashboard = true; 

            while($row=mysqli_fetch_assoc($result)){
                $pro_name=$row['name'];
                $pro_name=strtoupper($pro_name);
                
                $imagepath='/proctoring/proctor/image/'.$row['img'];

                
                $pplink='/proctoring/proctor/pro_MainProfile.php?userno='.$p_id.'';
                $sllink='/proctoring/proctor/showStudent.php?del=false&delete=false&userno='.$p_id.'';
                $sqlink='/proctoring/proctor/respond_query.php?userno='.$p_id.'';
                $nlink='/proctoring/proctor/pro_notice.php?userno='.$p_id.'';
                $salink='/proctoring/proctor/view_application.php?userno='.$p_id.'';
            }
        }
        else{

            //for profile not created 

            $use_dashboard = false; 

            $pro_name="PROCTOR";
            $imagepath='/proctoring/image/user.png';
            $pplink='/proctoring/proctor/pro_profile.php?userno='.$p_id.'';
            $sllink='#';
            $sqlink='#';
            $nlink='#';
            $salink='#';


            $sql="SELECT * FROM `proctor_detail` where `proctor_detail`.`userno`='$p_id'";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);

            if($num){
                $row=mysqli_fetch_assoc($result);
                $status = $row['status'];

                if($status == -1){

                $imagepath='/proctoring/image/user.png';
            
                $pplink='/proctoring/proctor/pro_profile.php?userno='.$p_id.'';
               

                }

                if($status == 0){

                    $pro_name=$row['name'];
                    $pro_name=strtoupper($pro_name);

                    $imagepath='/proctoring/proctor/image/'.$row['img'];

                    $pplink='#';

                }


            }


        }
    }
 }

//for admin

 if(!isset($_SESSION['aloggedin']) || $_SESSION['aloggedin']!=true){
    
 }
 else{
    $admin=true;
    $name= $_SESSION['username'];

    include 'admin/dbconnect.php';

    $sql= "SELECT * FROM `admincred`";
    $result=mysqli_query($con,$sql);
    while($row= mysqli_fetch_assoc($result)){
        
        if($row['username']==$name){
            $a_id = $row['sno'];
        } 
    }


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

    <style>
        .color1:hover{
            background-color: blue;
        }

    .img{
        position: relative;
       
    }

    .img img{
        height: 72vh;
        width: 100%;
    }

    .txt1{
        position: absolute;
        bottom: 16%;
        color: aliceblue;
        font-size: 75px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        left: 33%;
        text-shadow: 2px 2px turquoise;
    }
    .txt2{
        position: absolute;
        bottom: 7%;
        color: aliceblue;
        font-size: 45px;
        left: 34%;
        text-shadow: 1px 1px turquoise;
       align-content: center;
    }
    .cards{
        position: absolute;
        width: 100vw;
        bottom: -200px;
        display: grid;
        grid-template-columns: auto auto auto;
        justify-items: center;
    }
    
    .crd{
        background-color: white;
        border: 1px solid turquoise;
        border-top-right-radius: 80px;
        border-top-left-radius: 10px;
        width: 172.22px;
    }
    .crd:hover{
        box-shadow: 0px 0px 10px 2px rgb(194, 239, 241);
    }

    .event{
        display: grid;
        grid-template-columns: auto auto auto auto;
        justify-items: center;
    }
    
    .foot{
        background: rgba(0, 0, 0, 0) url('/proctoring/image/footer.jpeg');
        background-size: cover;
    }

    .btnsign{
    
    border: 2px rgb(199, 38, 194) solid ;
    background-color: purple ;
    color: white;
    border-radius: 10px;
    background: none;
}

.btnlogin{
   
    border: 2px rgb(199, 38, 194) solid ;
    background-color: purple ;
    color: white;
    border-radius: 10px;
    background: none;
}
.btnlogout{
    border: 2px rgb(199, 38, 194) solid ;
    background-color: purple ;
    color: white;
    border-radius: 10px;
    background: none;
}

.btnsign:hover{
    box-shadow: 0px 0px 8px 2px  rgb(192, 17, 186);
    /* color: white; */
    cursor: pointer;
}

.btnlogin:hover{
    box-shadow: 0px 0px 8px 2px  rgb(192, 17, 186);
    /* color: white; */
    cursor: pointer;
}
.btnlogout:hover{
    box-shadow: 0px 0px 10px 2px rgb(207, 206, 206);
    color: white;
    cursor: pointer;
}

    .background{
    /* background: rgba(0, 0, 0, 0) url('mountain.jpeg');  */
    background: rgba(0, 0, 0, 0) url('/proctoring/image/backg.jpeg'); 
    background-size: cover;
    background-attachment: fixed;
    background-blend-mode: darken;
    color: white;
    }

    @media (max-width: 1200px) {

        .img img{
            height: 72vh;
            width: 100%;
        }

        .img .txt1{
            position: absolute;
            bottom: 16%;
            color: aliceblue;
            font-size: 75px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            left: 33%;
            text-shadow: 2px 2px turquoise;
        }

        .img .txt2{
            position: absolute;
            bottom: 7%;
            color: aliceblue;
            font-size: 45px;
            left: 34%;
            text-shadow: 1px 1px turquoise;
            align-content: center;
        }
        
    }

    @media (max-width: 991px) {

        .img img{
            height: 65vh;
            width: 100%;
        }

        .img .txt1{
            position: absolute;
            bottom: 16%;
            color: aliceblue;
            font-size: 45px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            left: 31%;
            text-shadow: 1.7px 1.7px turquoise;
        }

        .img .txt2{
            position: absolute;
            bottom: 7%;
            color: aliceblue;
            font-size: 30px;
            left: 32%;
            text-shadow: 1px 1px turquoise;
            align-content: center;
        }
    
    }

    @media (max-width: 768px){
        .img img{
            height: 50vh;
            width: 100%;
        }

        .img .txt1{
            position: absolute;
            bottom: 18%;
            color: aliceblue;
            font-size: 35px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            left: 29%;
            text-shadow: 1.3px 1.3px turquoise;
        }

        .img .txt2{
            position: absolute;
            bottom: 8%;
            color: aliceblue;
            font-size: 25px;
            left: 30%;
            text-shadow: 1px 1px turquoise;
            align-content: center;
        }

    }

    @media (max-width: 450px) {
        .img img{
            height: 30vh;
            width: 100%;
        }

        .img .txt1{
            position: absolute;
            bottom: 19%;
            color: aliceblue;
            font-size: 29px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            left: 23%;
            text-shadow: 1px 1px turquoise;
        }

        .img .txt2{
            position: absolute;
            bottom: 8%;
            color: aliceblue;
            font-size: 19px;
            left: 24%;
            text-shadow: .8px .8px turquoise;
            align-content: center;
        }

        .cards{
            position: absolute;
            width: 100%;
            bottom: -200px;
            display: grid;
            grid-template-columns: auto auto auto;
            justify-items: center;
        }

        .crd{

            background-color: white;
            border: 1px solid turquoise;
            border-top-right-radius: 80px;
            border-top-left-radius: 10px;
           
        }
        
    }

    </style>

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
                            <a target="_blank" href="'.$profilePagePath.'?userno='.$s_id.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-circle-user"></i>
                                </span>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li >
                            <a target="_blank" href='.$qlink.' class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-clipboard-question"></i>
                                </span>
                                <span>Query</span>
                            </a>
                        </li>

                        <li >
                            <a target="_blank" href="'.$nlink.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                                      </svg>
                                </span>
                                <span>Notice</span>
                            </a>
                        </li>

                        <li >
                            <a target="_blank" href="'.$alink.'" class="nav-link px-3 active text-muted">
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
            <div class="col-md-5 col-5 fw-bold fs-3">Dashboard</div>
            <div class="col-md-5 col-12  ">

                <b>Proctor:</b> '.$pro_name.'  <img src=' .$pro_imagepath. '   width="40" height="40"  class="rounded-circle border border-light" alt="";">
                </br><b>Gmail: </b>'.$pro_gmail.'
                </br><b>Contact: </b>'.$pro_contact.'

            </div>
        </div>
    
            <div class="row my-3"> ';

        if($use_dashboard){    

            echo  ' <div class="col-lg-6">
            <a target="_blank" style="text-decoration: none;" href="/proctoring/student/view_notice.php?s_id='.$s_id.'"> <div class="card  mb-3">
                 <div class="card-header text-center fw-bold d-flex justify-content-center">New Notice ';
   
                 $sql = "SELECT * FROM `student_detail` Where `userno`=$s_id";
                 $res = mysqli_query($con,$sql);
   
                 $num = mysqli_num_rows($res);
   
                 if($num == 1){
                     $row = mysqli_fetch_assoc($res);
                     $dept = $row['branch']; 
                     $group = $row['grp']; 
                 }
   
               //   $sql2 = "SELECT * FROM `images` INNER JOIN  student_detail ON `images`.`branch` = `student_detail`.`branch` and `images`.`grp` = `student_detail`.`grp` where `images`.`is_application`=1 and `images`.`branch` = '$dept' and `images`.`grp` = '$group' and `images`.`seen`=0  ORDER By `images`.`image_id` DESC";
                 $sql2 = "SELECT * FROM `images`  where `images`.`is_notice`=1 and `images`.`branch` = '$dept' and `images`.`grp` = '$group' and `images`.`seen`=0  ORDER By `images`.`image_id` DESC";
                 $res2 = mysqli_query($con,$sql2);
                 $count2 = mysqli_num_rows($res2);
                
                 if($count2 > 0){
   
                     $temp = $count2 ;
                     if($count2 > 3)
                         $count2 = $count2.'+';
   
   
                         echo  '   <section class="text-danger">('.$count2.')</section>
                         </div>
                         <div class="card-title" style="height: 200px;"> ';
   
                             echo ' <ol class="list-group list-group-flush my-2"> ';
                                     $i=0;
                                    
                                     while($i!=3){
   
                                         
                                         $row2 = mysqli_fetch_array($res2);
                                         $name=$row2['send_by'];
                                       
                                         $i=$i+1;
                                         if(($temp <= 1 && $i == 1) || ($temp <= 2 && $i == 2) )
                                             $i =3;
   
   
                                         echo ' 
                                                     <li class="list-group-item d-flex justify-content-between align-items-start my-1"> 
                                                         <div class="ms-2 me-auto "> 
                                                             <div class="d-flex justify-content-around"><section class="my-1" >'.$i.'.</section>&nbsp&nbsp&nbsp <section class="my-1"> send by - <b>'.$name.'</b> </section> </div> ';
                                 echo '</div>
                                 <span class="badge bg-primary rounded-pill">New</span>
                             </li> ';
   
                         }
                         echo '</ol> ';
                     
                 }
                 else{
   
                     echo ' </div>
                     <div class="card-title" style="height: 200px;"> 
                         <h3 class="text-center pt-3" >No New Application </h2>
                      ';
   
                 }         
   
          echo ' </div></a>
             </div>
         </div>  ';



         echo  ' <div class="col-lg-6">
         <a target="_blank" style="text-decoration: none;" href="/proctoring/student/stu_query.php?s_id='.$s_id.'"> <div class="card  mb-3">
              <div class="card-header text-center fw-bold d-flex justify-content-center">Query Response ';

              $sql = "SELECT * FROM `student_detail` Where `userno`=$s_id";
              $res = mysqli_query($con,$sql);

              $num = mysqli_num_rows($res);

              if($num == 1){
                  $row = mysqli_fetch_assoc($res);
                  $dept = $row['branch']; 
                  $group = $row['grp']; 
              }

              $sql2 = "SELECT * FROM `query`  where `query`.`branch` = '$dept' and `query`.`grp` = '$group' and `query`.`responded`=1 and `seen_by_stu`=0  ORDER By `query`.`query_id` DESC";
              $res2 = mysqli_query($con,$sql2);
              $count2 = mysqli_num_rows($res2);
             
              if($count2 > 0){

                  $temp = $count2 ;
                  if($count2 > 3)
                      $count2 = $count2.'+';


                      echo  '   <section class="text-danger">('.$count2.')</section>
                      </div>
                      <div class="card-title" style="height: 200px;"> ';

                          echo ' <ol class="list-group list-group-flush my-2"> ';
                                  $i=0;
                                 
                                  while($i!=3){

                                      
                                      $row2 = mysqli_fetch_array($res2);
                                      $send_by=$pro_name;
                                      $img=$pro_imagepath;
                                     
                                      

                                      // $sql1 ="SELECT * FROM `student_detail` Where  `userno`='$sid'  ";
                                      // $res1 = mysqli_query($con,$sql1);
                                      
                                      
                                      // $row1 = mysqli_fetch_array($res1);
                                      // $name=$row1['name'];
                                      // $img=$row1['img'];

                                      $i=$i+1;
                                      if(($temp <= 1 && $i == 1) || ($temp <= 2 && $i == 2) )
                                          $i =3;


                                      echo ' 
                                                  <li class="list-group-item d-flex justify-content-between align-items-start my-1"> 
                                                      <div class="ms-2 me-auto "> 
                                                          <div class="d-flex justify-content-around"><img src="'.$img.'"  width="41" height="40"  class="rounded-circle border border-info" alt="">&nbsp&nbsp&nbsp <section class="my-1"> by - <b>'.$send_by.'</b> </section> </div> ';
                              echo '</div>
                              <span class="badge bg-primary rounded-pill">New</span>
                          </li> ';

                      }
                      echo '</ol> ';
                  
              }
              else{

                  echo ' </div>
                  <div class="card-title" style="height: 200px;"> 
                      <h3 class="text-center pt-3" >No Response </h2>
                   ';

              }         

        echo ' </div></a>
            </div>
        </div>  ';


      
      echo  ' <div class="col-lg-6">
      <a target="_blank" style="text-decoration: none;" href="/proctoring/student/approved_application.php?s_id='.$s_id.'"> <div class="card  mb-3">
           <div class="card-header text-center fw-bold d-flex justify-content-center">Approved Application ';

           $sql = "SELECT * FROM `student_detail` Where `userno`=$s_id";
           $res = mysqli_query($con,$sql);

           $num = mysqli_num_rows($res);

           if($num == 1){
               $row = mysqli_fetch_assoc($res);
               $dept = $row['branch']; 
               $group = $row['grp']; 
           }

         //   $sql2 = "SELECT * FROM `images` INNER JOIN  student_detail ON `images`.`branch` = `student_detail`.`branch` and `images`.`grp` = `student_detail`.`grp` where `images`.`is_application`=1 and `images`.`branch` = '$dept' and `images`.`grp` = '$group' and `images`.`seen`=0  ORDER By `images`.`image_id` DESC";
           $sql2 = "SELECT * FROM `images`  where `images`.`is_application`=1 and `images`.`branch` = '$dept' and `images`.`grp` = '$group' and `images`.`seen`=1   ORDER By `images`.`image_id` DESC";
           $res2 = mysqli_query($con,$sql2);
           $count2 = mysqli_num_rows($res2);
          
           if($count2 > 0){

               $temp = $count2 ;
               if($count2 > 3)
                   $count2 = $count2.'+';


                   echo  '   <section class="text-danger">('.$count2.')</section>
                   </div>
                   <div class="card-title" style="height: 200px;"> ';

                       echo ' <ol class="list-group list-group-flush my-2"> ';
                               $i=0;
                              
                               while($i!=3){

                                   
                                   $row2 = mysqli_fetch_array($res2);

                                   if($row2['approve']!=-1){

                                     if($row2['approve'] == 1)
                                            $app = 'Approved';
                                     else
                                            $app = 'Rejected';
                                   

                                   $name=$row2['send_by'];
                                 
                                   $i=$i+1;
                                   if(($temp <= 1 && $i == 1) || ($temp <= 2 && $i == 2) )
                                       $i =3;


                                   echo ' 
                                               <li class="list-group-item d-flex justify-content-between align-items-start my-1"> 
                                                   <div class="ms-2 me-auto "> 
                                                       <div class="d-flex justify-content-around"><section class="my-1" >'.$i.'.</section>&nbsp&nbsp&nbsp <section class="my-1"> '.$app.'</section> </div> ';
                           echo '</div>
                           <span class="badge bg-primary rounded-pill">New</span>
                       </li> ';
                     }
                   }
                   echo '</ol> ';
               
           }
           else{

               echo ' </div>
               <div class="card-title" style="height: 200px;"> 
                   <h3 class="text-center pt-3" >No Pending Application </h2>
                ';

           }         

    echo ' </div></a>
       </div>
   </div>  ';


         echo ' <div class="col-lg-6 col-md-3">
                    <div class="card   mb-3">
                        
                        <div class="card-title" style="height: 200px;">
                        
                        </div>
                    </div>
                </div>

                
                
                            
            </div> ';
        }       
    echo '</div>
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
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">'.$pro_name.'</a>
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
                            <a target="_blank" href="'.$pplink.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-circle-user"></i>
                                </span>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li >
                                <a target="_blank" href="'.$sllink.'" class="nav-link px-3 active text-muted">
                                    <span class="me-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                        </svg>
                                    </span>
                                    <span>Student List</span>
                                </a>
                            </li>

                        <li >
                            <a target="_blank" href="'.$sqlink.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <i class="fa-solid fa-clipboard-question"></i>
                                </span>
                                <span>Student Queries</span>
                            </a>
                        </li>

                        <li >
                            <a target="_blank" href="'.$nlink.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                                      </svg>
                                </span>
                                <span>Notice</span>
                            </a>
                        </li>

                        <li >
                            <a target="_blank" href="'.$salink.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                      </svg>
                                </span>
                                <span>Student Applications</span>
                            </a>
                        </li>
                        
                    </div>
                </li>

                <hr class="dropdown-divider"/>
                    <a href="#" class="nav-link px-3 active text-light">
                        <span class="me-2 ">
                            <img src="'.$imagepath.'"  width="40" height="40"  class="rounded-circle border border-light" alt="">
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
        </div> ';

    if($use_dashboard){ 
        
       echo ' <div class="row my-3">
            <div class="col-lg-6">
               <a target="_blank" style="text-decoration: none;" href="/proctoring/proctor/showStudent.php?del=false&delete=false&userno='.$p_id.'"> <div class="card  mb-3">
                    <div class="card-header text-center fw-bold d-flex justify-content-center">New Students ';

                    $sql = "SELECT * FROM `proctor_detail` Where `userno`=$p_id";
                    $res = mysqli_query($con,$sql);

                    $num = mysqli_num_rows($res);

                    if($num == 1){
                    $row = mysqli_fetch_assoc($res);
                    $dept = $row['for_branch']; 
                    $group = $row['grp']; 
                    }

                    $sql1 ="SELECT * FROM `student_detail` Where  `branch` = '$dept' and `grp` = '$group' and `seen_by_pro`=0  ORDER By `student_detail`.`sno` DESC  ";
                    $result = mysqli_query($con,$sql1);

                    $count = mysqli_num_rows($result);

                    if($count==0){

                        echo ' </div>
                        <div class="card-title" style="height: 200px;"> 
                            <h3 class="text-center pt-3" >No Any New Student</h2>
                         ';

                    }


                   
                   if($count>0){

                        $temp = $count ;
                        if($count > 3)
                            $count = $count.'+';

                        echo  '   <section class="text-danger">('.$count.')</section>
                        </div>
                        <div class="card-title" style="height: 200px;"> ';

                            echo ' <ol class="list-group list-group-flush my-2"> ';
                                    $i=0;
                                    while($i!=3){

                                        $row1 = mysqli_fetch_array($result);
                                        $name=$row1['name'];
                                        $img=$row1['img'];
                                        $i=$i+1;
                                        if(($temp <= 1 && $i == 1) || ($temp <= 2 && $i == 2))
                                            $i =3;


                                        echo ' 
                                                    <li class="list-group-item d-flex justify-content-between align-items-start my-1"> 
                                                        <div class="ms-2 me-auto "> 
                                                            <div class="d-flex justify-content-around"><img src="/proctoring/student/'.$img.'"  width="41" height="40"  class="rounded-circle border border-info" alt="">&nbsp&nbsp&nbsp <section class="my-1"> <b>'.$name.'</b> </section> </div> ';
                                echo '</div>
                                <span class="badge bg-primary rounded-pill">New</span>
                            </li> ';

                        }
                        echo '</ol> ';

                   }

             echo ' </div></a>
                </div>
            </div>  ';
            
          echo  ' <div class="col-lg-6">
               <a target="_blank" style="text-decoration: none;" href="/proctoring/proctor/respond_query.php?userno='.$p_id.'"> <div class="card  mb-3">
                    <div class="card-header text-center fw-bold d-flex justify-content-center">New Queries ';

                    $sql = "SELECT * FROM `proctor_detail` Where `userno`=$p_id";
                    $res = mysqli_query($con,$sql);

                    $num = mysqli_num_rows($res);

                    if($num == 1){
                        $row = mysqli_fetch_assoc($res);
                        $dept = $row['for_branch']; 
                        $group = $row['grp']; 
                    }

                    $sql2 = "SELECT * FROM `query` INNER JOIN student_detail ON `query`.`s_id` = `student_detail`.`userno`  where `query`.`branch` = '$dept' and `query`.`grp` = '$group' and `query`.`responded`=0  ORDER By `query`.`query_id` DESC";
                    $res2 = mysqli_query($con,$sql2);
                    $count2 = mysqli_num_rows($res2);
                   
                    if($count2 > 0){

                        $temp = $count2 ;
                        if($count2 > 3)
                            $count2 = $count2.'+';


                            echo  '   <section class="text-danger">('.$count2.')</section>
                            </div>
                            <div class="card-title" style="height: 200px;"> ';
    
                                echo ' <ol class="list-group list-group-flush my-2"> ';
                                        $i=0;
                                       
                                        while($i!=3){

                                            
                                            $row2 = mysqli_fetch_array($res2);
                                            $sid = $row2['s_id'];
                                            $qid=$row2['query_id'];
                                            $name=$row2['name'];
                                            $img=$row2['img'];
                                            

                                            // $sql1 ="SELECT * FROM `student_detail` Where  `userno`='$sid'  ";
                                            // $res1 = mysqli_query($con,$sql1);
                                            
                                            
                                            // $row1 = mysqli_fetch_array($res1);
                                            // $name=$row1['name'];
                                            // $img=$row1['img'];

                                            $i=$i+1;
                                            if(($temp <= 1 && $i == 1) || ($temp <= 2 && $i == 2) )
                                                $i =3;
    
    
                                            echo ' 
                                                        <li class="list-group-item d-flex justify-content-between align-items-start my-1"> 
                                                            <div class="ms-2 me-auto "> 
                                                                <div class="d-flex justify-content-around"><img src="/proctoring/student/'.$img.'"  width="41" height="40"  class="rounded-circle border border-info" alt="">&nbsp&nbsp&nbsp <section class="my-1"> send by - <b>'.$name.'</b> </section> </div> ';
                                    echo '</div>
                                    <span class="badge bg-primary rounded-pill">New</span>
                                </li> ';
    
                            }
                            echo '</ol> ';
                        
                    }
                    else{

                        echo ' </div>
                        <div class="card-title" style="height: 200px;"> 
                            <h3 class="text-center pt-3" >No Any Queries </h2>
                         ';

                    }         

             echo ' </div></a>
                </div>
            </div>  ';
            


           echo ' <div class="col-lg-6">
            <a target="_blank" style="text-decoration: none;" href="/proctoring/proctor/view_notice.php?&userno='.$p_id.'"> <div class="card  mb-3">
                 <div class="card-header text-center fw-bold d-flex justify-content-center">Notice From Admin ';

                 $sql = "SELECT * FROM `admin_notice` Where `seen_by_pro`=0";
                 $res = mysqli_query($con,$sql);

                 $num = mysqli_num_rows($res);

                 if($num==0){

                     echo ' </div>
                     <div class="card-title" style="height: 200px;"> 
                         <h3 class="text-center pt-3" >No Notice From Admin</h2>
                      ';

                 }
                if($num>0){

                     $temp = $num ;
                     if($num > 3)
                         $num = $num.'+';

                     echo  '   <section class="text-danger">('.$num.')</section>
                     </div>
                     <div class="card-title" style="height: 200px;"> ';

                         echo ' <ol class="list-group list-group-flush my-2"> ';
                                 $i=0;
                                 while($i!=3){

                                     $row = mysqli_fetch_array($res);
                                     $send_by=$row['send_by'];
                                    
                                     $i=$i+1;
                                     if(($temp <= 1 && $i == 1) || ($temp <= 2 && $i == 2))
                                         $i =3;


                                     echo ' 
                                                 <li class="list-group-item d-flex justify-content-between align-items-start my-1"> 
                                                     <div class="ms-2 me-auto "> 
                                                         <div class="d-flex justify-content-around"><section class="my-1" >'.$i.'.</section>&nbsp&nbsp&nbsp <section class="my-1"> <b>'.$send_by.'</b> </section> </div> ';
                             echo '</div>
                             <span class="badge bg-primary rounded-pill">New</span>
                         </li> ';

                     }
                     echo '</ol> ';

                }

          echo ' </div></a>
             </div>
         </div>  ';


          
          
         echo  ' <div class="col-lg-6">
         <a target="_blank" style="text-decoration: none;" href="/proctoring/proctor/view_application.php?userno='.$p_id.'"> <div class="card  mb-3">
              <div class="card-header text-center fw-bold d-flex justify-content-center">New Application From Student ';

              $sql = "SELECT * FROM `proctor_detail` Where `userno`=$p_id";
              $res = mysqli_query($con,$sql);

              $num = mysqli_num_rows($res);

              if($num == 1){
                  $row = mysqli_fetch_assoc($res);
                  $dept = $row['for_branch']; 
                  $group = $row['grp']; 
              }

            //   $sql2 = "SELECT * FROM `images` INNER JOIN  student_detail ON `images`.`branch` = `student_detail`.`branch` and `images`.`grp` = `student_detail`.`grp` where `images`.`is_application`=1 and `images`.`branch` = '$dept' and `images`.`grp` = '$group' and `images`.`seen`=0  ORDER By `images`.`image_id` DESC";
              $sql2 = "SELECT * FROM `images`  where `images`.`is_application`=1 and `images`.`branch` = '$dept' and `images`.`grp` = '$group' and `images`.`seen`=0  ORDER By `images`.`image_id` DESC";
              $res2 = mysqli_query($con,$sql2);
              $count2 = mysqli_num_rows($res2);
             
              if($count2 > 0){

                  $temp = $count2 ;
                  if($count2 > 3)
                      $count2 = $count2.'+';


                      echo  '   <section class="text-danger">('.$count2.')</section>
                      </div>
                      <div class="card-title" style="height: 200px;"> ';

                          echo ' <ol class="list-group list-group-flush my-2"> ';
                                  $i=0;
                                 
                                  while($i!=3){

                                      
                                      $row2 = mysqli_fetch_array($res2);
                                      $name=$row2['send_by'];
                                    
                                      $i=$i+1;
                                      if(($temp <= 1 && $i == 1) || ($temp <= 2 && $i == 2) )
                                          $i =3;


                                      echo ' 
                                                  <li class="list-group-item d-flex justify-content-between align-items-start my-1"> 
                                                      <div class="ms-2 me-auto "> 
                                                          <div class="d-flex justify-content-around"><section class="my-1" >'.$i.'.</section>&nbsp&nbsp&nbsp <section class="my-1"> send by - <b>'.$name.'</b> </section> </div> ';
                              echo '</div>
                              <span class="badge bg-primary rounded-pill">New</span>
                          </li> ';

                      }
                      echo '</ol> ';
                  
              }
              else{

                  echo ' </div>
                  <div class="card-title" style="height: 200px;"> 
                      <h3 class="text-center pt-3" >No New Application </h2>
                   ';

              }         

       echo ' </div></a>
          </div>
      </div>  ';
      

                        
       echo ' </div> ';
    }
    echo '</div>
</main>
';
}
elseif($admin){
        echo '  <!-- navabar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <!-- offcanvas trigger -->
                <button class="navbar-toggler me-2 " type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon " data-bs-target="#offcanvasExample"></span>
                </button>
                <!-- offcanvas trigger -->
                <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">ADMIN</a>
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
                                <a target="_blank" href="/proctoring/admin/showProctor.php?del=false&delete=false" class="nav-link px-3 active text-muted">
                                    <span class="me-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                        </svg>
                                    </span>
                                    <span>Assign Proctor Group</span>
                                </a>
                            </li>

                            <li >
                                <a target="_blank" href="/proctoring/admin/assign_grp.php?del=false&delete=false" class="nav-link px-3 active text-muted">
                                    <span class="me-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                        </svg>
                                    </span>
                                    <span>Assign Student group</span>
                                </a>
                            </li>

                            <li >
                                <a href="/proctoring/admin/showStudent.php?del=false&delete=false" class="nav-link px-3 active text-muted">
                                    <span class="me-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                        </svg>
                                    </span>
                                    <span>Student List</span>
                                </a>
                            </li>

                            <li >
                                <a href="/proctoring/admin/Asigned_Proctor.php" class="nav-link px-3 active text-muted">
                                    <span class="me-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                        </svg>
                                    </span>
                                    <span>Proctor List</span>
                                </a>
                            </li>

                            <li >
                            <a target="_blank" href="/proctoring/admin/send_notice.php?userno='.$a_id.'" class="nav-link px-3 active text-muted">
                                <span class="me-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                                      </svg>
                                </span>
                                <span>Notice</span>
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
            <div class="row my-3">
                <div class="col-lg-6">
                    <div class="card  mb-3">
                        <div class="card-header text-center fw-bold">New Application</div>
                        <div class="card-title" style="height: 200px;">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3">
                    <div class="card   mb-3">
                        <div class="card-header text-center fw-bold">New Notice</div>
                        <div class="card-title" style="height: 200px;">
                        
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card  mb-3">
                        <div class="card-header text-center fw-bold">Query Responses</div>
                        <div class="card-title" style="height: 200px;">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3">
                    <div class="card   mb-3">
                        <div class="card-header text-center fw-bold">New Notice</div>
                        <div class="card-title" style="height: 200px;">
                        
                        </div>
                    </div>
                </div>
                            
            </div>
        </div>
    </main>
    ';

  }
  else{
      echo '<nav class="navbar navbar-expand-lg navbar-dark bg-light background  fixed-top">
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
                          data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(192, 17, 186);">
                          Sign Up
                      </a>
                      <ul class="dropdown-menu my-2 color" aria-labelledby="navbarDropdown">
                          
                          <li  class="color1"><a class="dropdown-item" href="proctor/pro_signup.php">proctor</a></li>
                          <li>
                              <hr class=" my-0 mb-0 text-muted dropdown-divider">
                          </li>
                          <li  class="color1"><a class="dropdown-item" href="student/stu_signup.php">student</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown btn  btnlogin text-uppercase mx-2">
                      <a class="nav-link dropdown hbtn" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(192, 17, 186); ">
                          Login
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end my-2 color" aria-labelledby="navbarDropdown">
                          <li class="colorr"><a class=" dropdown-item " href="admin/admin_login.php">Admin</a></li>
                          <li>
                              <hr class=" my-0 mb-0 text-muted dropdown-divider">
                          </li>
                          <li  class="color1"><a class="dropdown-item" href="proctor/pro_login.php">proctor</a></li>
                          <li>
                              <hr class=" my-0 mb-0 text-muted dropdown-divider">
                          </li>
                          <li class="color1"><a class="dropdown-item" href="student/stu_login.php">student</a></li>
                      </ul>
                  </li>
                  <!-- <button type="button" class="btn  btnlogin mx-2" >Login</button> -->

                  <!-- <button onclick="logout()" class="btnlogout">Logout</button> -->
              </form>
          </div>
      </div>
  </nav>
  

<div class="img backg">
    <img src="/proctoring/image/backg.jpeg"   alt="image">
    <div class="txt1">WELCOME TO</div>
    <div class="txt2">CSIT DEPARTMENT</div>
    <div class="cards col-12">
        <div class="col-lg-5 col-md-3 ">
            <div class="crd   mb-3">
                <!-- <div class="card-header text-center fw-bold">New Queries</div> -->
                <div class="card-title text-center" style="height: 200px; ">
                    <img class="my-3" src="/proctoring/image/pic-1.png" style="height: 100px; width: 100px; border-radius: 50px"  alt="image">
                   
                    <h6 class="my-0">Dr. Suvendu Chandan Nayak</h6>
                    <hr class="dropdown-divider mx-4 my-0 bg-info"/>
                    <p>CSIT HOD</p>

                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-3 ">
            <div class="crd   mb-3">
                <!-- <div class="card-header text-center fw-bold">New Queries</div> -->
                <div class="card-title text-center" style="height: 200px; ">
                    <img class="my-3" src="/proctoring/image/pic-1.png" style="height: 100px; width: 100px; border-radius: 50px;"  alt="image">
                   
                    <h6 class="my-0">Dr. Suvendu Chandan Nayak</h6>
                    <hr class="dropdown-divider mx-4 my-0 bg-info"/>
                    <p>CSIT HOD</p>

                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-3 ">
            <div class="crd   mb-3">
                <!-- <div class="card-header text-center fw-bold">New Queries</div> -->
                <div class="card-title text-center" style="height: 200px; ">
                    <img class="my-3" src="/proctoring/image/pic-1.png" style="height: 100px; width: 100px; border-radius: 50px"  alt="image">
                   
                    <h6 class="my-0">Dr. Suvendu Chandan Nayak</h6>
                    <hr class="dropdown-divider mx-4 my-0 bg-info"/>
                    <p>CSIT HOD</p>


                </div>
            </div>
        </div>

    </div>
</div>

<div class="events" style="margin-top: 250px; ">
    <h1 class="text-center" style="color: blueviolet; text-shadow: 1px 1px turquoise;">Events Organised By CSIT Department</h1>
    <div class="event my-3 ">

        <div>
            <img src="/proctoring/image/event.jpg" height="250px" width="200px"  alt="image">
        </div>

        <div>
            <img src="/proctoring/image/event.jpg" height="250px" width="200px"  alt="image">
        </div>

        <div>
            <img src="/proctoring/image/event.jpg" height="250px" width="200px"  alt="image">
        </div>
        
        <div>
            <img src="/proctoring/image/event.jpg" height="250px" width="200px"  alt="image">
        </div>
        
    
    </div>
</div>


  <!-- footer -->
    <div class="container-fluid foot  text-light " style="margin-top: 400px;">

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
