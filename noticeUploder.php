<?php

    include 'proctor/dbconnect.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      
        $name=$_GET['by'];
        $id = $_GET['userno'];

        $nfile=$_FILES['file'];
        if($nfile['size']){


            // $sql1 = "SELECT * FROM p_detail  where `userno`='$pid' ";
            // $res1 = mysqli_query($con,$sql1);
            // $num1 = mysqli_num_rows($res1);

            // if($num1){
            //     $row1 = mysqli_fetch_array($res1);
            //     $branch = $row1['for_branch'];
            //     $grp = $row1['grp'];
            // }

            $filename=$nfile['name'];
            $fileerror=$nfile['error'];
            $filetmp=$nfile['tmp_name'];

            $fileext= explode('.',$filename);
            $filecheck= strtolower(end($fileext));

            $extstored=array('png','jpg','jpeg','pdf');

            if(in_array($filecheck,$extstored)){

                $destfile='image/'.$filename;
                move_uploaded_file($filetmp,$destfile);

                $sql="INSERT INTO `admin_notice` (`userno`, `send_by`, `img`, `dt`) VALUES ('$id', '$name', '$filename', current_timestamp())";

                $result=mysqli_query($con,$sql);

                header("location:/proctoring/admin/send_notice.php?upload=true&userno=$id");
            }
            else{
                header("location:/proctoring/proctor/send_notice.php?upload=false&userno=$id");
            }

        }



    }


       

   

        // else{
        //     header("location:/proctoring/student/leave.php?upload=false");
        // }
    
?>