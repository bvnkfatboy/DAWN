<?php
include_once('config.inc.php');
session_start();

$Total = 0;
$SumTotal = 0;
$order_name = $_POST['order_name'];
$order_email = $_POST['order_email'];
$order_tal = $_POST['order_tal'];
$order_address = $_POST['order_address'];
$datetime = date("Y-m-d H:i:s");


$keyrm = generateRandomString();
date_default_timezone_set('Asia/bangkok');


$sql = "INSERT INTO orders (order_date,order_name,order_address,order_email,order_tal,order_key,status)
VALUES ('$datetime','$order_name','$order_address','$order_email','$order_tal','$keyrm','รอชำระเงิน') ";
mysqli_query($conn,$sql);
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



function generateRandomString($length = 15) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
?>