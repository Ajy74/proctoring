<?php 

        include 'dbconnect.php';

       
        $userno = $_GET['userno'];
        $grp = $_GET['grp'];

       
            $sql=" UPDATE `proctor_detail` SET `grp`='$grp' , `status`=1 WHERE `proctor_detail`.`userno` = '$userno'";
            $res = mysqli_query($con,$sql);
  

        header("location:/proctoring/admin/showProctor.php?del=false&delete=false");

?>