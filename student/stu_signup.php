<?php 

$alertpass=false;
$alertsucc=false;
$exist="";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 

   include 'dbconnect.php'; 

   $username=$_POST["username"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   $cpassword=$_POST["cpassword"];
   $fno=$_POST["fno"];
   $nick=$_POST["nick"];

   //check for username exist or not //

   $existSql="SELECT * FROM `studentcred` WHERE username='$username'";
   $result= mysqli_query($con,$existSql);
   $numExistRows=mysqli_num_rows($result);
   if($numExistRows>0){
       $exist=true;
   }
   else{
       if($password==$cpassword){
            $hash=password_hash($password,PASSWORD_DEFAULT);
           $sql="INSERT INTO `studentcred` (`username`, `email`, `password`,`fav_no`,`nickname`,`dt`) VALUES ('$username','$email', '$hash','$fno','$nick', current_timestamp())";
           $result=mysqli_query($con,$sql);
           if($result){
               $alertsucc=true;
           }
       }
       else{
           $alertpass=true;
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
    <link rel="stylesheet" type="text/css" href="/proctoring/css/signup.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>SIGN UP</title>
</head>

<body class="background">

    <div class="container-fluid">
    <?php
     if($alertsucc){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your account has been succesfully created..😃
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Click on Button to Login</strong> 
    <a href='/proctoring/student/stu_login.php'><button class='btn btn-primary'>Login</button></a>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
   //header("location:/php/project/login_system/login.php");
    }
    if($exist){
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Oops</strong> username is already exist..
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }

    if($alertpass){
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Oops</strong> password doesn't match..
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
?>
        <div class="container my-4 ">
            <form action="/proctoring/student/stu_signup.php" method="post">
                <legend align="center"><b>SIGNUP FORM</b></legend>
                <fieldset class="color ps-4 pe-4 pt-4 pb-4" >
                    <!-- <legend align="center"><b>SIGNUP FORM</b></legend> -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="username" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="college E-mail id" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cpassword" class="col-sm-2 col-form-label">CONFIRM-PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="cpassword" id="cpassword"
                                placeholder="confirm password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fno" class="col-sm-2 col-form-label"> YOUR FAVOURATE-NUMBER</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="fno" id="fno"
                                placeholder="Favourite-Number" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nick" class="col-sm-2 col-form-label"> YOUR NICKNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nick" id="nick"
                                placeholder="Nickname" required>
                        </div>
                    </div>
                    <div class="d-grid  justify-content-md-end">
                        <button type="submit" class="btn btnsign" >sign up</button>
                    <div>
                    
                </fieldset>
            </form>
        </div>
    </div>

    

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
</body>

</html>