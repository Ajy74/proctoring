<?php 

    include 'dbconnect.php';

    $otpsent=false;
    $otpmatch=false;

    $sent=$_GET['sent'];
    $verified=$_GET['verified'];
    $email=$_GET['email'];

    if($sent=='true'){
        $otp = random_int(1000,9000);

        $to_mail = $email;
        $subject = "OTP Verification";
        $body = "Verify, Your Account By Entering OTP :-  $otp";
        $headers = "From : mouryaajay7463@gmail.com";


         mail($to_mail,$subject,$body,$headers) ;

        $sql="INSERT INTO `otp` (`email`, `OTP`, `dt`) VALUES ('$to_mail', '$otp', current_timestamp())";
        $result=mysqli_query($con,$sql);

      
        $otpsent=true;
        
   }


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // $sent=$_GET['sent'];
        // $verified=$_GET['verified'];
        // $email=$_GET['email'];
        
        //    if($sent){
        //         $otp = random_int(1000,9000);
                
        //         $to_mail = "$email";
        //         $subject = "OTP Verification";
        //         $body = "Verify, Your Account By Entering OTP- $otp";
        //         $headers = "From : mouryaajay7463@gmail.com";

        //         mail($to_mail,$subject,$body,$headers);

        //         $sql="INSERT INTO `otp` (`email`, `OTP`, `dt`) VALUES ('$to_mail', '$otp', current_timestamp())";
        //         $result=mysqli_query($con,$result);

        //         $otpsent=true;
        //    }

           if($verified=='true'){

            
                $otp = $_POST['otp'];

                $sql="SELECT * FROM `otp` where `otp`.`email`='$email' ";
                $result=mysqli_query($con,$sql);

                $row=mysqli_fetch_assoc($result);
                $fetch_otp=$row['OTP'];

                
                if($fetch_otp == $otp){
                    $sql="DELETE FROM `otp`";
                    $result=mysqli_query($con,$sql);

                    header("Location:/proctoring/student/stu_login.php?otp=true");
                   
                }
                else{
                    $otpmatch=true;
                   
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
    <link rel="stylesheet" type="text/css" href="/proctoring/css/notice.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>OTP-VERIFICATION</title>
</head>

<body class="background text-dark" onload="myFunction()">

        <div class="container  " style=" font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <!-- <div class='alert alert-success alert-dismissible fade show my-1' id="uploadTrue" role='alert' style="display:none">
                    <strong>Success!</strong> OTP verified..😃Now you can Login.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div> -->

                <!-- <div class='alert alert-danger alert-dismissible fade show my-1' role='alert' id="otpmatch" style="display:none">
                    <strong>Oops! </strong> Wrong OTP..😟
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div> -->

               <?php 
                    if($otpmatch== true){
                            
                            echo "<div class='my-1 alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Ooops!</strong> Wrong OTP..
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>"; 
                    }
                    if($otpsent== true){
                       
                        echo "<div class='my-1 alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>OTP Sent</strong> Check Your Email TO get OTP.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>"; 
                    }

                   
                ?>
                    
        
            
        
            <div class=" container-fluid  my-4">
                <div class="row">
                    <div class="col-md-6 mx-auto my-auto ">
                        <div class="card text-dark  mb-3">
                            <div class="card-body">
                                <form class="col-10 mx-auto text-center" action="/proctoring/student/stu_otp.php?sent=false&verified=true&email=<?php echo $email ?>"
                                    method="post" enctype="multipart/form-data">
                                    <h1 class="text-center text-primary"><b>OTP Verification</b></h1>
                                    <hr>
                                    <input type="text" placeholder="Enter 4-digit OTP" class="form-control my-5 p-2 text-center" name="otp" id="otp" style="width: 100%;border-radius: 15px;box-shadow: 2px 6px 18px rgba(66,57,238,0.2);" required>
                                
                                    <button type="submit" class=" btn btn-primary " style="border-radius: 15px;box-shadow: 2px 6px 18px rgba(66,57,238,0.2);">Verify</button>
                                    
                                </form>
                                
                            </div>
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

    <!-- <script>
    function myFunction() {
        // window.location.href = "http://localhost/proctoring/"
        urlString = window.location.href;
        var url = new URL(urlString);
        var upload = url.searchParams.get("");

        // console.log(update)
        if (upload == 'true') {
            var x = document.getElementById("uploadTrue");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        if (upload == 'false') {
            var x = document.getElementById("uploadfalse");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    }

    function noticelist(){

        var p = document.getElementById("")

    }

    </script> -->

</body>

</html>