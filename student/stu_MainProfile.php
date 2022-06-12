<?php 

session_start();
$username=$_SESSION['username'];

include 'dbconnect.php';

$s_id=$_GET['userno'];

$sql="SELECT * FROM `student_detail` where `student_detail`.`userno`='$s_id' ";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);

if($num){
    $row=mysqli_fetch_assoc($result);

    $img=$row['img'];
    $name=$row['name'];
    $roll=$row['roll'];
    $registration=$row['registration'];
    $branch=$row['branch'];
    $dob=$row['dob'];
    $grp=$row['grp'];
    $sem=$row['sem'];
    $hostel=$row['hostel'];
    $day=$row['day'];
    $blood=$row['blood'];
    $father=$row['father'];
    $mother=$row['mother'];
    $parentphone=$row['parentphone'];
    $studphone=$row['studphone'];
    $emrphone=$row['emrphone'];
    $state=$row['state'];
    $tenth=$row['10th'];
    $twlth=$row['12'];
    $hobby=$row['hobby'];
    $dt=$row['dt'];

    

    if(strtolower($hostel)=='y' && strtolower($day)=='n'){
        $hostel='YES';
        $day='NO';
    }
    else{
        $hostel='NO';
        $day='YES';
    }

    if(strtolower($day)=='y' && strtolower($hostel)=='n'){
        $day='YES';
        $hostel='NO';
    }
    else{
        $day='NO';
        $hostel='YES';
    }
    // $created=true;
}
else{
    
    // $created=false;

    echo '<div class="col-md-3 mx-auto">
                <div class="  text-dark bg-light mb-3">
                    <div class="card-header mx-auto">Profile not Created <div>
                    <div class="card-body">
                    <h5 class="card-title"></h5>
                    </div>
                </div>
            </div>';

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
    <link rel="stylesheet" type="text/css" href="/proctoring/css/notice.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>profile</title>
</head>

<body class="background text-dark">

    <div class="container-fluid ">
        <div class="container  my-5 ">

      
      
            <div class="card mx-auto col-lg-10 text-dark "
                style=" font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h2 class="my-3 mx-2 text-center"><b><u>GITA AUTONOMOUS COLLEGE,BHUBANESHWAR</u></b></h2>

                <div class="row g-3  " style="font-size: 20px;">
                    <div class="col-6 my-5">
                        <img  class=" col-10 col-sm-8 col-lg-4 mx-3 rounded border border-info" src="/proctoring/student/<?php echo $img ?>"  height="180px"/>
                    </div>
                    <div class="col-6">
                        
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Name</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $name?></p>
                    </div>
                    
                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Roll</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $roll?></p>
                    </div>
                   
                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Registration</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $registration?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Branch</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $branch?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Date Of BIrth</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $dob?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Group</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $grp?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Semester</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $sem?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Hosteler</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $hostel?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Day-Scholar</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $day?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Blood group</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo strtoupper($blood)?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Father's name</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $father?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Mother's name</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $mother?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Parent phn.</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $parentphone?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Student phn.</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $studphone?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Emergency phn.</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $emrphone?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">State</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo ucfirst($state)?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">10th Percentage/CGPA</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $tenth?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">12th Percentage/CGPA</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $twlth?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Hobby</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $hobby?></p>
                    </div>
                   
                </div>

        
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


    </script>
</body>

</html>