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

    <?php 

    include 'dbconnect.php';

    

        $sql="SELECT * FROM `query` where dummy='0'";

        echo '<h2 class="text-center text-info my-3"><b>List of Queries of Students</b></h2>';
        $showquery=true;    

        $result=mysqli_query($con,$sql);
        while($row= mysqli_fetch_assoc($result)){
            
            $query_id = $row['query_id'];
            $query_desc = $row['query_desc'];
            $user_n = $row['user_n'];
            $query_time = $row['timestamp'];
        
            $check=$_GET['send'];
            // echo true.$query_id;
            if($check=='true'.$query_id){
                $color="bg-success";
            }
            else{
                $color="bg-light";
            }

            $showquery=false;
                    echo ' <div class="container-fluid">
                    <div class="container my-4 ">

                        <div class="card '. $color .' text-dark">
                            <div class="flex-shrink-0 mb-0 my-2 mx-2">
                                <i class="fa-solid fa-circle-user"></i> <b>'.$user_n. '</b > at  ' .$query_time.'
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title mb-0 mx-3">'.$query_desc.'</h5>
                                <div class="card-body pb-0  d-grid  justify-content-md-end ">
                                    <button class="btn btn-primary m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$query_id.'" aria-expanded="false" aria-controls="collapse'.$query_id.'">
                                        Respond
                                    </button>
                                    <div class="collapse "  id="collapse'.$query_id.'">
                                    <div class="card card-body  my-2">
                                        <form action=" /proctoring/proctor/respond_query.php?qid='.$query_id.'&name=desc'.$query_id.'&send=true'.$query_id.'" method="post">
                                        <div class="form-floating mb-2 text-center pb-0">
                                            <textarea class="form-control"  id="desc'.$query_id.'" style="height: 100px" name="desc'.$query_id.'" required></textarea>
                                            <label for="desc'.$query_id.'"><b>Answer this Query..</b></label>
                                            <button type="submit" class="btn btn-success my-3 mb-0">Send</button>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            ';

        }

        
        if($showquery){
            echo ' <div class="container-fluid">
            <div class="container my-4 ">
            
            <div class="p-3 mb-4 bg-light rounded-3"">
            <div class="container text-dark">
                <p class="display-4">No Queries</p>
                <p class="lead"></p>
            </div>
        </div>
        </div>
        </div>';
        }
    
?>



    <!-- <div class="container-fluid">
        <div class="container my-4 ">

            <div class="card text-dark"> -->
    <!-- <h5 class="card-header">Featured</h5> -->
    <!-- <div class="card-body ">
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                    <div class="card-body d-md-flex justify-content-md-end">
                        <a href="#" class="btn btn-primary ">Respond</a>
                    </div>
                </div>
            </div>

        </div>
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
</body>

</html>