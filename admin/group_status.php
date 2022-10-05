<?php 

        include 'dbconnect.php';

       
        $userno = $_GET['userno'];
        $grp = $_GET['grp'];

       
            $sql=" UPDATE `student_detail` SET `grp`='$grp' , `status`=1 WHERE `student_detail`.`userno` = '$userno'";
            $res = mysqli_query($con,$sql);
  

        header("location:/proctoring/admin/assign_grp.php");

?>