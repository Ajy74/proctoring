<?php 

    $login=false;
    $showerror=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        include 'dbconnect.php';

        $username=$_POST["username"];
        $password=$_POST["password"];

        $sql="SELECT * FROM proctorcred where username='$username'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){

            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $login=true;
                    session_start();
                    $_SESSION['ploggedin']=true;
                    $_SESSION['username']=$username;
                    header("location:/proctoring/home.php");

                }
                else{
                    $showerror="invalid crendentials";
                }
            }
        }
        else{
            $showerror="invalid credentials";
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
    <title>LOGIN</title>
</head>

<body class="background">

    <div class="container-fluid">

    <?php
       if($login){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> You are logged in..😃
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
       }

       if($showerror){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Oops!</strong> $showerror
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
    ?>

        <div class="container my-4 ">
            <form action="/proctoring/proctor/pro_login.php" method="post">
                <legend align="center"><b>LOGIN FORM</b></legend>
                <fieldset class="color ps-4 pe-4 pt-4 pb-4" >
                    <!-- <legend align="center"><b>SIGNUP FORM</b></legend> -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="username">
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="password">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btnlogin " >Login</button>
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