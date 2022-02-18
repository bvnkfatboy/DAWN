<?php

include_once('config.inc.php');

session_start();
$sql = "SELECT * FROM orders_detail WHERE order_id = '".$_GET["OrderID"]."' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

$getname = "SELECT * FROM account WHERE acc_id='".$_SESSION["auth-id"]."' ";
$result = mysqli_query($conn, $getname);
$getnamerow = mysqli_fetch_array($result);
extract($getnamerow);

// echo $getnamerow['acc_name'];


if($query){

    $sql2 = "UPDATE orders SET status = 'พนักงานรับออเดอร์แล้ว' WHERE order_id ='".$row['order_id']."' ";
    $query2 = mysqli_query($conn,$sql2);


    $sql3 = "INSERT INTO delivery (order_id,order_key,delivery_name) VALUE ('".$row['order_id']."','".$_GET["order_key"]."','".$getnamerow['acc_name']."')";
    $query3 = mysqli_query($conn,$sql3);

    header('Location: ?page=delivery');
    exit;

}





?>