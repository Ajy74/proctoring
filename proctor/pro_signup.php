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

   $existSql="SELECT * FROM `proctorcred` WHERE username='$username'";
   $result= mysqli_query($con,$existSql);
   $numExistRows=mysqli_num_rows($result);
   if($numExistRows>0){
       $exist=true;
   }
   else{
       if($password==$cpassword){
           $hash=password_hash($password,PASSWORD_DEFAULT);
           $sql="INSERT INTO `proctorcred` (`username`, `email`, `password`,`fav_no`,`nickname`,`dt`) VALUES ('$username','$email', '$hash','$fno','$nick', current_timestamp())";
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
    <a href='/proctoring/proctor/pro_login.php'><button class='btn btn-primary'>Login</button></a>
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
            <form action="/proctoring/proctor/pro_signup.php" method="post">
            <div class="card text-dark">
               
               <div class="card-body d-flex " style="border-radius: 20px;">
                   <div class="col-6 ">
                           <legend class="my-4 mb-1" align="center"><b>SIGNUP FORM</b></legend>
                          
                           <div class="d-flex my-4 mx-auto d">
                               <label for="username" class=" mx-2 col-form-label"><img src="/proctoring/image/user.png" alt=""
                                       style="height:20px ;"></label>
                               <input type="text" class="form-control  mx-auto mb-0 i" name="username" id="username"
                                   placeholder="username" style=" box-shadow: 2px 6px 18px rgba(66,57,238,0.3);" required>
                           </div> 

                           <div class="d-flex my-4 mx-auto  d">
                               <label for="email" class=" mx-2 col-form-label"><img src="/proctoring/image/email.svg" height="20px" alt=""
                                       style="height:20px ;"></label>
                               <input type="email" class="form-control  mx-auto mb-0 i" name="email" id="email"
                               placeholder="college E-mail id" style=" box-shadow: 2px 6px 18px rgba(66,57,238,0.3);" required>
                           </div> 

                           <div class="d-flex my-4 mx-auto d">
                               <label for="password" class=" mx-2 col-form-label"><img src="/proctoring/image/password.png" alt=""
                                       style="height:20px ;"></label>
                               <input type="password" class="form-control  mx-auto mb-0 i" name="password" id="password"
                               placeholder="password" style=" box-shadow: 2px 6px 18px rgba(66,57,238,0.3);" required>
                           </div> 

                           <div class="d-flex my-4 mx-auto d">
                               <label for="cpassword" class=" mx-2 col-form-label"><img src="/proctoring/image/password.png" alt=""
                                       style="height:20px ;"></label>
                               <input type="password" class="form-control  mx-auto mb-0 i" name="cpassword" id="cpassword"
                               placeholder="confirm password" style=" box-shadow: 2px 6px 18px rgba(66,57,238,0.3);"  required>
                           </div> 

                           <div class="d-flex my-4 mx-auto d">
                               <label for="fno" class=" mx-2 col-form-label"><img src="/proctoring/image/number.svg" alt=""
                                       style="height:20px ;"></label>
                               <input type="number" class="form-control  mx-auto mb-0 i" name="fno" id="fno"
                               placeholder="Favourite-Number" style=" box-shadow: 2px 6px 18px rgba(66,57,238,0.3);" required>
                           </div> 

                           <div class="d-flex my-4 mx-auto d">
                               <label for="nick" class=" mx-2 col-form-label"><img src="/proctoring/image/heart-solid.svg" alt=""
                                       style="height:20px ;"></label>
                               <input type="text" class="form-control  mx-auto mb-0 i" name="nick" id="nick"
                               placeholder="Nickname" style=" box-shadow: 2px 6px 18px rgba(66,57,238,0.3);" required>
                           </div> 
                           <div class=" col-6  text-center mx-auto  "> <button type="submit" class="btn btnsign text-light rounded-circle " style=" box-shadow: 2px 6px 16px rgba(66,57,238,0.3);width: 90px;height: 55px;" >sign up</button></div>
                         
                   </div>
                   <!-- <div class=" col-6  text-center my-auto bg-info "> <button type="submit" class="btn btnsign text-light rounded-circle " style=" box-shadow: 2px 6px 16px rgba(66,57,238,0.3);" >sign up</button></div> -->
               </div>
               
               
           </div>

                   <!-- <div class="d-grid  justify-content-md-end">
                       <button type="submit" class="btn btnsign" >sign up</button>
                   <div>
                   
                -->

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
