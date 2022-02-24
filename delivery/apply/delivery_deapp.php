<?php

include_once('config.inc.php');


$sql = "SELECT * FROM orders_detail WHERE order_id = '".$_GET["OrderID"]."' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if($query){



    $sql2 = mysqli_query($conn,"DELETE FROM orders WHERE order_id = '".$row['order_id']."' ");

    header('location: ?page=delivery');

}





?>