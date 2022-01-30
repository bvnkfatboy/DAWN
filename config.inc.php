<?php

    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbdata = "cafe";

    $conn = new mysqli($dbserver,$dbuser,$dbpass,$dbdata) or die("ติดต่อฐานข้อมูลไม่ได้".$conn->connect_errno);

    
?>