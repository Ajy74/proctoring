<?php 

    include 'dbconnect.php';

    $aid = $_GET['aid'];
    $userno = $_GET['userno'];

    $sql = "UPDATE `images` SET `approve` = '0',`seen`='1' , `dt`=current_timestamp() WHERE `images`.`image_id` = $aid";
    $res = mysqli_query($con,$sql);

    header("location:/proctoring/proctor/view_application.php?userno=$userno");


?>