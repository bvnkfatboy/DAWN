<?php

include_once('include/navbar.php');

$check_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : ''; 

if($check_admin != 'member' ){

?>


<style>
    .btn-back {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
        margin-top:30px;
        margin-right:auto;
        margin-left:30px;
    }

    .btn-back:hover{
        background-color: whitesmoke;
        color: black;

    }
</style>
<div class="container">

<a href="?page=delivery" class="btn btn-primary btn-block btn-back">กลับหน้าพนักงาน</a><br>
ิ<br>
<h1 class="text-center"> รายการออเดอร์ที่กำลังรอรับ </h1>
<?php
    include_once('config.inc.php');
    $result = mysqli_query($conn,"SELECT * FROM orders  WHERE status='รอพนักงานรับ'");

    while($row = mysqli_fetch_array($result)){
        echo '    
        <a href="?page=showjob&&OrderID='.$row["order_id"].'" class="text-dark" style="text-decoration:none">
            <div class="card mx-auto" style="">
            <div class="card-body">
                <h5 class="card-title">ออเดอร์ : '.$row["order_key"].' <p> โดย '.$row["order_name"].'</p> </h5>
                <h6 class="card-subtitle mb-2 text-muted">วันที่: '.$row["order_date"].'</h6>
                <p class="card-text">สถานะ: '.$row["status"].'</p>
            </div>
            </div>
        </a> ';

    }

    ?>
    
    </div>
<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

