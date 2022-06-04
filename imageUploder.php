<?php

    include 'proctor/dbconnect.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        // $n=$_GET['n'];
        // $a=$_GET['a'];
        $name=$_GET['by'];

        $nfile=$_FILES['nfile'];
        $afile=$_FILES['afile'];
        
        // print_r($nfile);
        // echo '<br>';
        // print_r($afile);
        // echo '<br>';
        // $filename=$nfile['name'];
        // $filename2=$afile['name'];
        // echo '<br>';
        
        // echo $filename;
        // echo '<br>';
        // echo $filename2;





        if($nfile['size']){

            $filename=$nfile['name'];
            $fileerror=$nfile['error'];
            $filetmp=$nfile['tmp_name'];

            $fileext= explode('.',$filename);
            $filecheck= strtolower(end($fileext));

            $extstored=array('png','jpg','jpeg');

            if(in_array($filecheck,$extstored)){

                $destfile='image/'.$filename;
                move_uploaded_file($filetmp,$destfile);

                $sql="INSERT INTO `images` (`notice`, `is_notice`, `send_by`, `dt`) 
                VALUES ('$filename', '1','$name', current_timestamp());";

                $result=mysqli_query($con,$sql);

                header("location:/proctoring/proctor/pro_notice.php?upload=true");
            }
            else{
                header("location:/proctoring/proctor/pro_notice.php?upload=false");
            }

        }

        if($afile['size']){
            $afilename=$afile['name'];
            $afileerror=$afile['error'];
            $afiletmp=$afile['tmp_name'];

            $afileext= explode('.',$afilename);
            $afilecheck= strtolower(end($afileext));

            $aextstored=array('png','jpg','jpeg','pdf');

            if(in_array($afilecheck,$aextstored)){

                $destfile='image/'.$filename;
                move_uploaded_file($filetmp,$destfile);

                $sql="INSERT INTO `images` (`application`, `is_application`, `send_by`, `dt`) VALUES ('$afilename', '1','$name', current_timestamp())";

                $result=mysqli_query($con,$sql);
                header("location:/proctoring/student/leave.php?upload=true");
            }
        }
        else{
            header("location:/proctoring/student/leave.php?upload=false");
        }
    }
?>