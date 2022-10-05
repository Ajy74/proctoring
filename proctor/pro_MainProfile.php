<?php 

session_start();
$username=$_SESSION['username'];

include 'dbconnect.php';

$p_id=$_GET['userno'];

$sql="SELECT * FROM `proctor_detail` where `proctor_detail`.`userno`='$p_id' ";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);

if($num){
    $row=mysqli_fetch_assoc($result);

    $img=$row['img'];
    $name=$row['name'];
    $for_branch=$row['for_branch'];
    $grp=$row['grp'];
    $contact=$row['contact'];
    $email=$row['gmail'];
    $dt=$row['dt'];

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
                        <img  class=" col-10 col-sm-8 col-lg-4 mx-3 rounded border border-info" src="/proctoring/proctor/image/<?php echo $img ?>"  height="180px"/>
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
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Department</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $for_branch?></p>
                    </div>


                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Group</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $grp?></p>
                    </div>


                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Contact no.</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $contact?></p>
                    </div>

                    <div class="col-6 ">
                       <p class=" col-10 col-sm-8 col-lg-6 mx-3">Email</p>
                    </div>
                    <div class="col-6">
                        <p class=" col-10 col-sm-8 col-lg-6 mx-3"><?php echo $email?></p>
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