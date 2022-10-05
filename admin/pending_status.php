<?php 

        include 'dbconnect.php';

        $p = $_GET['p'];
        $userno = $_GET['userno'];

        if($p == 0){
            $sql=" UPDATE `student_detail` SET `status`=-1 WHERE `student_detail`.`userno` = '$userno'";
            $res = mysqli_query($con,$sql);
        }

        if($p == -1){
            $sql=" UPDATE `student_detail` SET `status`=0 WHERE `student_detail`.`userno` = '$userno'";
            $res = mysqli_query($con,$sql);
        }

        header("location:/proctoring/admin/assign_grp.php");

?>