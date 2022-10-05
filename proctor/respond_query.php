<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/proctoring/css/query.css" />
    <link rel="stylesheet" type="text/css" href="/proctoring/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>Student Query</title>
</head>

<body class="background"  style=" font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <div class="container-fluid">
        <div class="container my-4 ">
                <?php 

                include 'dbconnect.php';


                
                session_start();
                $name= $_SESSION['username'];


                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $respond_queryid=$_GET['qid'];
                        $respond_name=$_GET['tname'];
                        $check=$_GET['send'];

                        $query_desc=$_POST['desc'.$respond_queryid.''];
                        //$query_desc=$_POST['$repond_name'];
                
                        $sql="INSERT INTO `queryresponse` (`query_id`, `responce_desc`, `response_by`, `timestamp`) VALUES ('$respond_queryid', '$query_desc', '$name', current_timestamp())";
                    
                        $result=mysqli_query($con,$sql);
                            if($result)
                            {

                                $sql1 = "UPDATE `query` SET `responded` = 1 WHERE `query_id` = '$respond_queryid' ";
                                $res1 = mysqli_query($con,$sql1);

                                $showalert=true;
                                if($showalert){
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>submited!</strong> responded
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                }
                            }
                
                    }


                    $id = $_GET['userno'];

                    $sql1 = "SELECT * FROM proctor_detail  where `userno`='$id'  ";
                    $res1 = mysqli_query($con,$sql1);
                    $num1 = mysqli_num_rows($res1);

                    if($num1 == 1){
                        $row1 = mysqli_fetch_array($res1);

                        $branch = $row1['for_branch'];
                        $grp = $row1['grp'];
                    }


                    $sql="SELECT * FROM `query` where `branch`='$branch' and `grp`='$grp' and `responded`=0  ORDER BY `query_id` DESC";

                    echo '<div class=" text-info text-center mb-4">
                            <hr class="dropdown-divider "/>
                            <h1><b>List of Queries of Students</b></h1>
                            <hr class="dropdown-divider"/>
                         </div>';
                    $showquery=true;    

                    $result=mysqli_query($con,$sql);
                    $n=-1;
                    while($row= mysqli_fetch_assoc($result)){
                        
                        $query_id = $row['query_id'];
                        $query_desc = $row['query_desc'];
                        $user_n = $row['user_n'];
                        $query_time = $row['timestamp'];
                    
                        // $check=$_GET['send'];
                        // echo true.$query_id;
                        
                        if($_SERVER["REQUEST_METHOD"]=="POST"){    
                            if($check=='true'.$query_id){
                                $color="rgb(149, 249, 140)";
                                $visibility="invisible";
                                // $i=1;
                                // $n++;
                                // echo $n;
                                // while($i){
                                    
                                //     $arr = array();
                                //     $arr[$n]='true'.$query_id;
                                    
                                //     for($j=0;$j < count($arr);$j++){
                                //         echo $arr[$j];
                                //         echo "<br>";
                                //     }

                                    
                                //     echo $n;
                                //     $i=0;
                                    
                                // }
                                
                            }
                            else{
                                $color="bg-light";
                                $visibility="visible";
                            }
                        
                            $showquery=false;
                                    echo ' <div class="container-fluid">
                                    <div class="container my-4 ">

                                        <div class="card '. $color .' text-dark">
                                            <div class="flex-shrink-0 mb-0 my-2 mx-3">
                                                <i class="fa-solid fa-circle-user"></i> <b>'.$user_n. '</b > at  ' .$query_time.'
                                            </div>
                                            <div class="card-body ">
                                                <h5 class="card-title mb-0 mx-3">'.$query_desc.'</h5>
                                                <div class="card-body pb-0  d-grid  justify-content-md-end ">
                                                    <button class="btn btn-primary m-0 '. $visibility .'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$query_id.'" aria-expanded="false" aria-controls="collapse'.$query_id.'">
                                                        Respond
                                                    </button>
                                                    <div class="collapse "  id="collapse'.$query_id.'">
                                                    <div class="card card-body  my-2">
                                                        <form action=" /proctoring/proctor/respond_query.php?qid='.$query_id.'&tname=desc'.$query_id.'&send=true'.$query_id.'&sendby='.$name.'&userno='.$id.'" method="post">
                                                        <div class="form-floating mb-2 text-center pb-0">
                                                            <textarea class="form-control"  id="desc'.$query_id.'" style="height: 100px" name="desc'.$query_id.'" required></textarea>
                                                            <label for="desc'.$query_id.'"><b>Answer this Query..</b></label>
                                                            <button type="submit" class="btn btn-success my-3 mb-0 ">Send</button>
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
                        else{
                            $showquery=false;
                                    echo ' <div class="container-fluid">
                                    <div class="container my-4 ">

                                        <div class="card  text-dark">
                                            <div class="flex-shrink-0 mb-0 my-2 mx-2">
                                                <i class="fa-solid fa-circle-user"></i> <b>'.$user_n. '</b > at  ' .$query_time.'
                                            </div>
                                            <div class="card-body ">
                                                <h5 class="card-title mb-0 mx-3">'.$query_desc.'</h5>
                                                <div class="card-body pb-0  d-grid  justify-content-md-end ">
                                                    <button class="btn btn-primary m-0 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$query_id.'" aria-expanded="false" aria-controls="collapse'.$query_id.'">
                                                        Respond
                                                    </button>
                                                    <div class="collapse "  id="collapse'.$query_id.'">
                                                    <div class="card card-body  my-2">
                                                        <form action=" /proctoring/proctor/respond_query.php?qid='.$query_id.'&tname=desc'.$query_id.'&send=true'.$query_id.'&sendby='.$name.'&userno='.$id.'" method="post">
                                                        <div class="form-floating mb-2 text-center pb-0">
                                                            <textarea class="form-control"  id="desc'.$query_id.'" style="height: 100px" name="desc'.$query_id.'" required></textarea>
                                                            <label for="desc'.$query_id.'"><b>Answer this Query..</b></label>
                                                            <button type="submit" class="btn btn-success my-3 mb-0 ">Send</button>
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
                    }

                    
                    if($showquery){
                        echo '<div class=" mb-4 bg-light rounded-3"">
                        <div class="container p-2 pb-0 text-dark text-center">
                            <p class="display-6 text-muted">No Queries Found..!!</p>
                            <p class="lead"></p>
                        </div>
                    </div>';;
                    }


                    
            ?>
        </div>
    </div>    


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