<?php 

    $login=false;
    $showerror=false;
    if($_SERVER["REQUEST_METHOD"]=="GET"){

        include 'dbconnect.php';

        $ufno=$_GET["ufno"];
        $unick=$_GET["unick"];
        $npassword=$_GET["npassword"];

        $sql="SELECT * FROM admincred where fav_no='$ufno'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num>=1){
            echo 'result';
            
            while($row=mysqli_fetch_assoc($result)){
                // $hash=password_hash($npassword,PASSWORD_DEFAULT);
                    if($row['nickname']==$unick){
                        // echo true;
                        $sno=$row['sno'];
                        $updateSql="UPDATE `admincred` SET `password` = '$npassword' WHERE `admincred`.`sno` = '$sno'";
                        $uresult=mysqli_query($con,$updateSql);
                        if($uresult){
                            header("location:/proctoring/admin/admin_login.php?update=true");
                        }
                    }
                    else{
                        echo 'false';
                        header("location:/proctoring/admin/admin_login.php?update=false&nick=false");
                    }
            }
        }
        else{
            // echo 'b false';
            header("location:/proctoring/admin/admin_login.php?update=false&fno=false");
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
    <title>forgot password</title>
</head>

<body class="background">

    <div class="container-fluid">

    
        
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
