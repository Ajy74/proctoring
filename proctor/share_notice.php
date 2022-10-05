<?php

    //include 'proctor/dbconnect.php';

    $server="localhost";
    $username="root";
    $password="";
    $database="proctoring";

    $con= mysqli_connect($server,$username,$password,$database);
    
    if(!$con){
        die("connection failed due to: ". mysqli_connect_error());
    }

       
        $nid = $_GET['notice_id'];
        $name=$_GET['by'];
        $pid = $_GET['userno'];

        
        $sql = "SELECT * FROM `admin_notice` where `nid`=$nid";
        $res = mysqli_query($con,$sql);

        if(mysqli_num_rows($res)){

            $row = mysqli_fetch_assoc($res);
            $filename = $row['img'];

            $sql1 = "SELECT * FROM proctor_detail  where `userno`='$pid' ";
            $res1 = mysqli_query($con,$sql1);
            $num1 = mysqli_num_rows($res1);


            if($num1){
                $row1 = mysqli_fetch_array($res1);
                $branch = $row1['for_branch'];
                $grp = $row1['grp'];
            }

            $sql2="INSERT INTO `images` (`notice`, `is_notice`, `send_by`,`branch`,`grp`, `dt`) 
                VALUES ('$filename', '1','$name','$branch','$grp', current_timestamp());";

            $result=mysqli_query($con,$sql2);

            if($result)
                header("location:/proctoring/proctor/view_notice.php?share=true&userno=$pid");
            

        }
        else
            header("location:/proctoring/proctor/view_notice.php?share=false&userno=$pid");

    
?>