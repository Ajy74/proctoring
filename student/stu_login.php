<?php 

    $login=false;
    $showerror=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        include 'dbconnect.php';

        $username=$_POST["username"];
        $password=$_POST["password"];

        $sql="SELECT * FROM studentcred where username='$username'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){

            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $login=true;
                    session_start();
                    $_SESSION['Sloggedin']=true;
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

<body class="background" onload="myFunction()">

    <div class="container-fluid">

    <?php
        // if($_SERVER["REQUEST_METHOD"]=="GET"){
            // $update=$_GET["update"];
            // $nick=$_GET["nick"];
            // $fno=$_GET["fno"];
            // if($update=='true'){
            //     echo "";
            // }
            // else{
            //     if($nick=='false'){
            //         echo "";
            //     }
            //     if($fno=='false'){
            //         echo "";
            //     }
            
            // }
        // }  
    
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
        <div class='alert alert-success alert-dismissible fade show my-1' id="updateTrue" role='alert' style="display:none">
            <strong>Success!</strong> Your Password Updated Successfuly..😃 now you can login 
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

        <div class='alert alert-danger alert-dismissible fade show my-1' role='alert' id="nick" style="display:none">
            <strong>Oops! nickname does not match</strong> Your Password is not  updated..😟
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        <div class='alert alert-danger alert-dismissible fade show my-1' role='alert' id="fav" style="display:none">
            <strong>Oops! Favaurite Number does not match</strong> Your Password is not Updated..😟
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

        <div class="container my-4  col-lg-6">
            <form action="/proctoring/student/stu_login.php" method="post">
                <legend align="center"><b>LOGIN FORM</b></legend>
                <fieldset class="color ps-4 pe-4 pt-4 pb-4">
                    <!-- <legend align="center"><b>SIGNUP FORM</b></legend> -->
                    <div class="row mb-3 ">
                        <label for="username" class="col-sm-2 col-form-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="username">
                        </div>
                    </div>

                    <div class="row mb-3 ">
                        <label for="password" class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="password">
                        </div>
                    </div>

                    <div class="d-grid  justify-content-md-end">
                        <button type="submit" class="btn btnlogin ">Login</button>
                    </div>

                </fieldset>
            
                <div class=" text-center my-2">
                    <a><button type="button" class="btn btnsign col-xs-6" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Forgot-Password</button></a>
                </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card card-body text-dark my-2">
                                    <form
                                        action="/proctoring/student/forgot_pass.php"
                                        method="get">
                                        <div class="form-floating mb-2 text-center pb-0">

                                            <div class="row mb-3 ">
                                                <label for="ufno"
                                                    class="col-sm-4 col-form-label">FAVOURATE-NUMBER</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="ufno" id="ufno"
                                                        placeholder="Favourite-Number" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ">
                                                <label for="unick" class="col-sm-4 col-form-label">NICKNAME</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="unick" id="unick"
                                                        placeholder="Nickname" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ">
                                                <label for="npassword"
                                                    class="col-sm-4 col-form-label">NEW-PASSWORD</label>
                                                <div class="col-sm-8">
                                                    <input type="npassword" class="form-control" name="npassword"
                                                        id="npassword" placeholder="New Password" required>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success my-3 mb-0 ">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- modal -->

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
    <script>
        function myFunction(){
            // window.location.href = "http://localhost/proctoring/"
            urlString = window.location.href;
            var url = new URL(urlString);
            var update = url.searchParams.get("update");
            var fno =  url.searchParams.get("fno");
            var nick =  url.searchParams.get("nick");
            // console.log(update)
            if(update == 'true'){
                var x = document.getElementById("updateTrue");
                if (x.style.display === "none") {
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