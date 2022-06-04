<?php 

session_start();
$username=$_SESSION['username'];


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
    <title>Proctor_Notice</title>
</head>

<body class="background" onload="myFunction()">

    <div class='alert alert-success alert-dismissible fade show my-1' id="uploadTrue" role='alert' style="display:none">
        <strong>Success!</strong> Notice uploaded Successfuly..😃
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>

    <div class='alert alert-danger alert-dismissible fade show my-1' role='alert' id="uploadfalse" style="display:none">
        <strong>Oops! </strong> Please upload in(jpeg,jpg or png format) ..😟
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>

    <div class="container  " style=" font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
        <div class=" container-fluid  my-4">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="card text-dark  mb-3">
                        <div class="card-body">
                            <form class="col-10 mx-auto text-center" action="/proctoring/imageUploder.php?by=<?php echo $username?>"
                                method="post" enctype="multipart/form-data">
                                <h1 class="text-center text-primary"><b>Upload Notice</b></h1>
                                <hr>
                                <input type="file" class="form-control my-5 p-2" name="nfile" id="nfile" style="width: 100%;border-radius: 15px;box-shadow: 2px 6px 18px rgba(66,57,238,0.2);" required>
                            
                                <button type="submit" class=" btn btn-primary " style="border-radius: 15px;box-shadow: 2px 6px 18px rgba(66,57,238,0.2);">Upload</button>
                                
                            </form>
                            <div  class=" text-center">
                                <p class="my-3" style="font-family: myriad pro;color:#f17c58;font-size: 14px;"> NOTE: (Upload only jpg , jpeg or png format file up to 100kb)</a> </p>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-dark mb-3">
                        <div class="card-body">
                            <form class="col-10 mx-auto text-center" action="/proctoring/imageUploder.php?by=<?php echo $username?>"
                                method="post" enctype="multipart/form-data">
                                <h1 class="text-center text-primary"><b>Notice For You</b></h1>
                                <hr>
                            
                                <button type="button" class=" btn btn-primary p-2 my-3 " onclick="noticelist()" style="border-radius: 15px;box-shadow: 2px 6px 18px rgba(66,57,238,0.2);">View All</button>
                                
                            </form>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>





    <hr>


    <!-- <?php 

                    include 'dbconnect.php';

                    $sql="SELECT * FROM images where is_notice='1'";
                    $result=mysqli_query($con,$sql);

                    $num=mysqli_num_rows($result);

                    while($row=mysqli_fetch_assoc($result)){
                        $img=$row['notice'];
                       
                        echo '<img src="/proctoring/image/'.$img.'" height="100px" width="100px">';
                        // echo '<img src="data:image;base64,'.base64_encode($row['notice']).'" height="100px" width="100px">';
                    }

                ?>
                 -->



    <!-- </div>
   </div> -->



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

    </script>
</body>

</html>