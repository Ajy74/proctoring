<?php 

    include 'dbconnect.php';

    $sql=" SELECT * FROM `images` where `images`.`is_notice`='1' ORDER BY `images`.`image_id` DESC ";
    $result=mysqli_query($con,$sql);
    $num=mysqli_fetch_assoc($result);
    
    if($num){
        $present=true;
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
    <title>PROCTORING-FORM</title>
</head>

<body class="background text-dark">

    <div class="container-fluid">
        <div class="container my-4 ">

            <div class="row">

        <?php 

                  
            if($present){

            
                while($row=mysqli_fetch_assoc($result)){
                    
                 //doubt here --it fetch less than 1 present //

                   $img=$row['notice'];
                   $time=$row['dt'];
                   $by=$row['send_by'];

                   $afilename=$img;
       
                   $afileext= explode('.',$afilename);
                   $afilecheck= strtolower(end($afileext));
                
                   if($afilecheck=='pdf'){
                                echo '<div class="col-md-3">
                                <div class=" card text-dark bg-light mb-3" style="min-height:40vh;">
                                    <div class="card-header">'.$time.'</div>
                                    <div class="card-body">
                                    <h5 class="card-title">Send by:- '.$by.'</h5>
                                    <a target="blank"  href="/proctoring/image/'.$img.'" ><embed class="col-12 "  alt="image" src="/proctoring/image/'.$img.'" height="135px"/>Click to Open</a>
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
                                <a target="blank" href="/proctoring/image/'.$img.'" ><img class="col-12 "  alt="image" src="/proctoring/image/'.$img.'" height="135px"/></a>
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
</body>

</html>