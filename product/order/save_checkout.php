<?php
include_once('config.inc.php');
session_start();



$Total = 0;
$SumTotal = 0;
$order_name = $_POST['order_name'];
$order_email = $_POST['order_email'];
$order_tal = $_POST['order_tal'];
$order_address = $_POST['order_address'];
$order_shiping = $_POST['order_shiping'];
$order_status = $_POST['order_status'];
$datetime = date("Y-m-d H:i:s");


$keyrm = RandomString(10);
date_default_timezone_set('Asia/bangkok');


$sql = "INSERT INTO orders (order_date,order_name,order_address,order_email,order_tal,order_key,status,order_shiping,order_track,order_rider)
VALUES ('$datetime','$order_name','$order_address','$order_email','$order_tal','$keyrm','$order_status','$order_shiping','','') ";

mysqli_set_charset($conn,"utf8");
mysqli_query($conn,$sql) or die("ติดต่อฐานข้อมูลไม่ได้".$conn -> error);
$strOrderID = mysqli_insert_id($conn);
for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
{
    if($_SESSION["strProductID"][$i] != "")
    {

        // echo 'asd';
        
        $ses_pro = $_SESSION["strProductID"][$i];
        $ses_qty = $_SESSION["strQty"][$i];
        $sqls = "INSERT INTO orders_detail (pro_id,order_id,qty)
        VALUES ('$ses_pro','$strOrderID','$ses_qty') ";
        
        mysqli_query($conn,$sqls);
    }
}


ob_start();
unset($_SESSION['intLine']);
unset($_SESSION['strProductID']);
unset($_SESSION['strQty']);
header('Location:?page=cart');


function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    $key = "";
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}


?>