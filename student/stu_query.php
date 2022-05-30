<?php 

    include 'dbconnect.php';

    // $user=$_GET['user'];
    $id=$_GET['s_id'];

    session_start();
    $name= $_SESSION['username'];

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $query_desc=$_POST['desc'];

        $sql="INSERT INTO `query` (`query_desc`, `s_id`, `user_n`, `dummy`,  `timestamp`) VALUES ('$query_desc', '$id', '$name', '0', current_timestamp())";
       
        $result=mysqli_query($con,$sql);
            if($result)
            {
                $showalert=true;
                if($showalert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>submited!</strong> your doubt will be clear soon..
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
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
    <link rel="stylesheet" type="text/css" href="/proctoring/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>PROCTORING-FORM</title>
</head>

<body class="background">

    <div class="container-fluid">
        <div class="container my-4 ">

            <div class="container my-4 text-dark p-0">
                <div class="p-2 mb-4 bg-light rounded-3 pb-0 ">
                    <div class="container-fluid py-5 pb-3">
                        <h1 class="display-6 text-center text-primary">Ask Your Doubt</h1>

                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="form-floating mb-2 text-center">
                                <textarea class="form-control" placeholder="Leave a comment here" id="desc"
                                    style="height: 100px" name="desc" required></textarea>
                                <label for="desc">Type your concern..</label>
                                <button type="submit" class="btn btn-success my-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
            <div class=" text-info">
                 <hr class="dropdown-divider "/>
                 <h1><b>Your Doubts are here</b></h1>
                 <hr class="dropdown-divider"/>
            </div>

     
            
                <?php 
                    
                
                    $sql= "SELECT * FROM `query` WHERE s_id=$id";
                    
                    $result=mysqli_query($con,$sql);

                    $noResult=true;
                    while($row= mysqli_fetch_assoc($result)){
                        
                        $noResult=false;
                        $qid = $row['query_id'];
                        $desc = $row['query_desc'];
                        $time = $row['timestamp'];

                        $rsql= "SELECT * FROM `queryresponse` WHERE query_id=$qid";
                        $rresult=mysqli_query($con,$rsql);
                        $responsResult=false;
                        while($rowr= mysqli_fetch_assoc($rresult)){
                            
                            $responsResult=true;
                            $response_desc=$rowr['responce_desc'];
                            $response_by=$rowr['response_by'];
                            $response_time=$rowr['timestamp'];
                            
                        }

                        if($responsResult){
                            echo '<div class="card text-dark  mb-2">
                            
                            <div class="card-body pb-0">
                                <div class="flex-shrink-0 mb-0">
                                    <i class="fa-solid fa-circle-user"></i> <b>You</b >
                                </div>
                                    <p class="card-text my-0"> <h6 class="my-0 mx-4 mb-0">'.$desc.'</h6></p>
                                <div class="card-body d-md-flex  justify-content-md-end text-muted p-0">
                                        <p  class="btn btn-light  my-0 mb-0 ">'.$time.'</p>
                                </div>
        
                                <div class="flex-shrink-0 mb-0 my-2">
                                    <i class="fa-solid fa-circle-user"></i> <b>'.$response_by.'</b >
                                </div>
                                    <p class="card-text my-0"> <h6 class="my-0 mx-4 mb-0">'.$response_desc.'</h6></p>
                                <div class="card-body d-md-flex  justify-content-md-end text-muted p-0">
                                        <p  class="btn btn-light  my-0 mb-1 ">'.$response_time.'</p>
                                </div>
                            </div>
                        </div>';

                        }
                        else{
                            echo '<div class="card text-dark  mb-2">
                            
                            <div class="card-body pb-0">
                                <div class="flex-shrink-0 mb-0">
                                    <i class="fa-solid fa-circle-user"></i> <b>You</b >
                                </div>
                                    <p class="card-text my-0"> <h6 class="my-0 mx-4 mb-0">'.$desc.'</h6></p>
                                <div class="card-body d-md-flex  justify-content-md-end text-muted p-0">
                                        <p  class="btn btn-light  my-0 mb-1 ">'.$time.'</p>
                                </div>
                                </div>
                        </div>';
                        }

                    }

                    if($noResult){
                        echo '<div class=" mb-4 bg-light rounded-3"">
                        <div class="container p-2 pb-0 text-dark text-center">
                            <p class="display-6 text-muted">No Doubts Found..!!</p>
                            <p class="lead"></p>
                        </div>
                    </div>';

                    }

                ?>
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