<?php

include_once('config.inc.php');


$sql = "SELECT * FROM orders_detail WHERE order_id = '".$_GET["OrderID"]."' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if($query){

    $sql2 = "UPDATE orders SET status = 'สำเร็จ' WHERE order_id ='".$row['order_id']."' ";
    $query2 = mysqli_query($conn,$sql2);
    $sql3 = "UPDATE payment SET pay_status = 'สำเร็จ' WHERE order_key ='".$_GET["order_key"]."' ";
    $query3 = mysqli_query($conn,$sql3);
    header('location: ?page=admin_approve');

}





?>