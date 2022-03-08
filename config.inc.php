<?php


    // $dbserver = "www2.mec.ac.th";
    // $dbuser = "prg05";
    // $dbpass = "prg05@itmuk";
    // $dbdata = "prg05";

    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbdata = "cafe";

    $conn = new mysqli($dbserver,$dbuser,$dbpass,$dbdata) or die("ติดต่อฐานข้อมูลไม่ได้".$conn->connect_errno);
    mysqli_set_charset($conn,"utf8");

    
?>