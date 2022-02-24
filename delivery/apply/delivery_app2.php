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

    $sql2 = "UPDATE orders SET status = 'สำเร็จแล้ว' WHERE order_id ='".$row['order_id']."' ";
    $query2 = mysqli_query($conn,$sql2);

    header('Location: ?page=delivery');
    exit;

}





?>