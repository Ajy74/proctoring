<?php 

session_start();
$username=$_SESSION['username'];

  include 'dbconnect.php';

  $userno=$_GET['userno'];
 
    if($_SERVER["REQUEST_METHOD"]=="POST"){

      $img=$_FILES['img'];
      $name=$_POST['name'];
      $for_branch=$_POST['for_branch'];
      $grp=$_POST['grp'];
      $contact=$_POST['contact'];
      $gmail=$_POST['gmail'];
      
      
      if($img['size']){

        $filename=$img['name'];
        $fileerror=$img['error'];
        $filetmp=$img['tmp_name'];

        $fileext= explode('.',$filename);
        $filecheck= strtolower(end($fileext));

        $extstored=array('png','jpg','jpeg');

        if(in_array($filecheck,$extstored)){

            // $destfile='/proctoring/image/studentimg/'.$filename;
            $destfile='image/'.$filename;
            move_uploaded_file($filetmp,$destfile);

            $image=1;
          
          
        }
      

        if($image){

          $sql=" INSERT INTO `proctor_detail` (`name`,`userno`, `for_branch`, `img`, `grp`, `contact`, `gmail`,`status`, `dt`) VALUES ('$name','$userno', '$for_branch', '$filename', '0', '$contact', '$gmail',0, current_timestamp())";

          $result=mysqli_query($con,$sql);

            header("location:/proctoring/home.php?upload=true");

        }
        else{
            header("location:/proctoring/home.php?upload=false");
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
    <link rel="stylesheet" type="text/css" href="/proctoring/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->

    <title>Profile</title>

</head>

<body class="background text-dark" onload="myFunction()">

    <div class="container-fluid">

        <div class="container my-5 ">
            <div class=" card text-dark" style="display:block;">
                <legend align="center"><b>PROFILE DETAILS</b></legend>
                <fieldset class="ps-4 pe-4 pt-4 pb-4">
                    <form class="row g-3" action="/proctoring/proctor/pro_profile.php?userno=<?php echo $userno ?>&name=<?php echo $username?>"
                        method="post" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <label for="studentname" class="form-label"><b>Name</b></label>
                            <input type="text" class="form-control" id="studentname" name="name"
                                placeholder="Enter your Name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="img" class="form-label"><b>Passport Size Photo</b></label>
                            <input type="file" class="form-control" id="img" name="img" accept="image/*" required>
                        </div>
                       
                        <div class="col-md-4">
                            <label for="branch" class="form-label"><b>Branch</b></label>
                            <input type="text" class="form-control" id="branch" name="for_branch" required>
                        </div>
                        <div class="col-md-4">
                            <label for="grp" class="form-label"><b>Group</b></label>
                            <input type="number" maxlength="1" class="form-control" id="grp" name="grp">
                        </div>
                
                        <div class="col-md-4">
                            <label for="parentphone" class="form-label"><b>contact no</b></label>
                            <input type="number" class="form-control" id="contact" name="contact" required>
                        </div>
                        <div class="col-md-4">
                            <label for="studphone" class="form-label"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="gmail"
                                required>
                        </div>

                     
                        <!-- <div class="col-md-4">
                      <label for="inputState" class="form-label">State</label>
                      <select id="inputState" class="form-select form-control" name="inputState" >
                        <option selected>Choose...</option>
                        <option>BIHAR</option>
                        <option>ODISHA</option>
                        <option>JHARKHAND</option>
                        <option>ASSAM</option>
                      </select>
                    </div> -->

                    <div class="col-12 text-center ">
                        <button type="submit" class="btn btnNext"  name="btnNext" id="btnNext" style="border: 2px rgb(199, 38, 194) solid ;background-color: purple ;color: white; box-shadow: 2px 6px 18px rgba(66,57,238,0.2);">SUBMIT <i class="fa-solid fa-arrow-up"></i></button>
                      </div>

                    </form>
                    <div class=" text-center my-2 mb-3">
                        <p class="my-3" id="warning" style="font-family: myriad pro;color:#f17c58;font-size: 14px;display:none;"> NOTE: (Upload
                            only jpg , jpeg or png format file up to 100kb)</a>
                           </p>
                    </div>
                </fieldset>
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

    <script>
    function myFunction() {
        // window.location.href = "http://localhost/proctoring/"
        urlString = window.location.href;
        var url = new URL(urlString);
        var upload = url.searchParams.get("upload");

        // console.log(update)
     
        if (upload == 'false') {
            var x = document.getElementById("warning");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    }
    </script>
</body>

</html>