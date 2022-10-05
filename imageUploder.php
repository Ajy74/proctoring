<?php

    include 'proctor/dbconnect.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $n=$_GET['n'];
        $a=$_GET['a'];
        $name=$_GET['by'];

    }



        

       if($a){

        $afile=$_FILES['afile'];
        if($afile['size']){

            $id = $_GET['userno'];


            $sql1 = "SELECT * FROM student_detail  where `userno`='$id' ";
            $res1 = mysqli_query($con,$sql1);
            $num1 = mysqli_num_rows($res1);

            if($num1){
                $row1 = mysqli_fetch_array($res1);
                $branch = $row1['branch'];
                $grp = $row1['grp'];
            }

           
            $filename=$afile['name'];
            $fileerror=$afile['error'];
            $filetmp=$afile['tmp_name'];

            $fileext= explode('.',$filename);
            $filecheck= strtolower(end($fileext));

            $extstored=array('png','jpg','jpeg');

            if(in_array($filecheck,$extstored)){

                $destfile='image/'.$filename;
                move_uploaded_file($filetmp,$destfile);


                $sql="INSERT INTO `images` (`application`, `is_application`, `send_by`,`branch`,`grp`,`dt`) VALUES ('$filename', '1','$name','$branch','$grp',current_timestamp())";

                $result=mysqli_query($con,$sql);
                header("location:/proctoring/student/leave.php?upload=true&s_id=$id");
            }
            else{
                header("location:/proctoring/student/leave.php?upload=false&s_id=$id");
            }
        }

       }


       if($n){

        $nfile=$_FILES['nfile'];
        if($nfile['size']){

            $pid = $_GET['userno'];


            $sql1 = "SELECT * FROM proctor_detail  where `userno`='$pid' ";
            $res1 = mysqli_query($con,$sql1);
            $num1 = mysqli_num_rows($res1);

            if($num1){
                $row1 = mysqli_fetch_array($res1);
                $branch = $row1['for_branch'];
                $grp = $row1['grp'];
            }

            $filename=$nfile['name'];
            $fileerror=$nfile['error'];
            $filetmp=$nfile['tmp_name'];

            $fileext= explode('.',$filename);
            $filecheck= strtolower(end($fileext));

            $extstored=array('png','jpg','jpeg','pdf');

            if(in_array($filecheck,$extstored)){

                $destfile='image/'.$filename;
                move_uploaded_file($filetmp,$destfile);

                $sql="INSERT INTO `images` (`notice`, `is_notice`, `send_by`,`branch`,`grp`, `dt`) 
                VALUES ('$filename', '1','$name','$branch','$grp', current_timestamp());";

                $result=mysqli_query($con,$sql);

                header("location:/proctoring/proctor/pro_notice.php?upload=true&userno=$pid");
            }
            else{
                header("location:/proctoring/proctor/pro_notice.php?upload=false&userno=$pid");
            }

        }


       } 

        // else{
        //     header("location:/proctoring/student/leave.php?upload=false");
        // }
    
?>