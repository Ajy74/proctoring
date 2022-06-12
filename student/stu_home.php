<?php

    $to_mail = "mouryaajay7463@gmail.com";
    $subject = "Simple email test via php";
    $body = "Hi, this is testing email via php Script";
    $headers = "From : mouryaajay9110@gmail.com";

    var_dump(mail($to_mail,$subject,$body,$headers));

    if(mail($to_mail,$subject,$body,$headers)){
        echo "Email Succesfully send to $to_mail..";

    }
    else{
        echo "failed!..";
    }


?>