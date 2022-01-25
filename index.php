<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $output = '<title>%TITLE%</title>'; ?>


    <!-- font  -->
    <link rel="stylesheet" href="dist/css/font.css">
    <link rel="stylesheet" href="dist/css/fontawesome.css">

    <link rel="stylesheet" href="dist/css/reset.css">
    <link rel="icon" href="dist/img/icontitle.png" type="image/png" >
    
    <link rel="stylesheet" href="dist/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="dist/sweetalert/sweetalert.css">

    <script src="dist/bootstrap/jquery.slim.min.js"></script>
    <script src="dist/bootstrap/bootstrap.js"></script>
    <script src="dist/sweetalert/sweetalert.js"></script>
</head>
<body>


<?php 
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home' ;

switch ($current_page) {
    case ('home'):
        include_once 'homepage.php';
        $title = "หน้าแรก - DAWN (Coffee & Bar)";
        $output = str_replace('%TITLE%', $title, $output);
        echo $output;
        break;

    // auth 
    case ('login'):
        include_once 'auth/login.php';
        $title = "เข้าสู่ระบบ - DAWN (Coffee & Bar)";
        $output = str_replace('%TITLE%', $title, $output);
        echo $output;
        break;
    case ('register'):
        include_once 'auth/register.php';
        $title = "สมัครสมาชิก - DAWN (Coffee & Bar)";
        $output = str_replace('%TITLE%', $title, $output);
        echo $output;
        break;
    
    default:
        include_once 'error.php';
        $title = "ไม่พบหน้านี้ - DAWN (Coffee & Bar)";
        $output = str_replace('%TITLE%', $title, $output);
        echo $output;
        break;
}


?>


</body>
</html>


