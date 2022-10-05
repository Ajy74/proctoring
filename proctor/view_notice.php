<?php 

    include 'dbconnect.php';

    $sql=" SELECT * FROM `admin_notice`  ORDER BY `admin_notice`.`nid`  DESC ";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    
    if($num){
        $present=true;
        $userno = $_GET['userno'];
    }
    else{
        $present=false;
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
    <title>View_Notice</title>
</head>

<body class="background text-dark" onload="myFunction()">

    <div class="container-fluid">

    <div class='alert alert-success alert-dismissible fade show my-1' id="shareTrue" role='alert' style="display:none">
        <strong>Success!</strong> Notice Shared To Students Successfuly..😃
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>

    <div class='alert alert-danger alert-dismissible fade show my-1' role='alert' id="sharefalse" style="display:none">
        <strong>Notice Shared Failed! </strong> Something Went Wrong ..😟
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>


        <div class="container my-4 ">

            <div class="row">

        <?php 

                  
            if($present){

            
                while($row=mysqli_fetch_assoc($result)){
                    
                 //doubt here --it fetch less than 1 present //

                   $img=$row['img'];
                   $time=$row['dt'];
                   $by=$row['send_by'];
                   $nid = $row['nid'];

                   $afilename=$img;
       
                   $afileext= explode('.',$afilename);
                   $afilecheck= strtolower(end($afileext));
                
                   if($afilecheck=='pdf'){
                                echo '<div class="col-md-3">
                                <div class=" card text-dark bg-light mb-3" style="min-height:40vh;">
                                    <div class="card-header">'.$time.'</div>
                                    <div class="card-body">
                                    <h6 class="card-title">Send by:- '.$by.'</h6>
                                    <embed class="col-12 "  alt="image" src="/proctoring/image/'.$img.'" height="135px"/>
                                    
                                    </br>
                                    <div class="d-flex justify-content-between my-1">
                                        <a target="blank"  href="/proctoring/image/'.$img.'" ><button class="btn btn-primary pt-1 pb-1">Open</button></a>
                                        <a href="/proctoring/proctor/share_notice.php?userno='.$userno.'&notice_id='.$nid.'" ><button class="btn btn-success pt-1 pb-1">Share</button></a>
                                    </div>    
                                    
                                    </div>
                                </div>
                            </div>';  
                   }
                   else{
                            echo '<div class="col-md-3">
                            <div class=" card text-dark bg-light mb-3" style="min-height:40vh;">
                                <div class="card-header">'.$time.'</div>
                                <div class="card-body">
                                <h5 class="card-title">Send by:- '.$by.'</h5>
                                <img  class="col-12 "  alt="image" src="/proctoring/image/'.$img.'" height="135px"/>
                                </br>
                                <div class="d-flex justify-content-between my-1">
                                    <a target="blank" href="/proctoring/image/'.$img.'" ><button class="btn btn-primary pt-1 pb-1">Open</button></a>
                                    <a href="/proctoring/proctor/share_notice.php?userno='.$userno.'&notice_id='.$nid.'" ><button class="btn btn-success pt-1 pb-1">Share</button></a>
                                </div>
                                </div>
                            </div>
                        </div>';  
                   }  

                }
            }            
            else{
               
                echo '<div class="col-md-3 mx-auto">
                <div class=" text-dark bg-light mb-3">
                    <div class="card-header">No Notice Available</div>
                    <div class="card-body">
                    <h5 class="card-title"></h5>
                    </div>
                </div>
            </div> ';
            }       
           

        ?>
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
    
        var share = url.searchParams.get("share");

        // console.log(update)
       

        if (share == 'true') {
            var x = document.getElementById("shareTrue");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        if (share == 'false') {
           
            var x = document.getElementById("sharefalse");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }


    }

    // function noticelist(){

    //     var p = document.getElementById("")

    // }

    </script>

</body>

</html>