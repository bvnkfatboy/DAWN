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

<?php
    include_once('config.inc.php');
    $check_id = isset($_SESSION['auth-id']) ? $_SESSION['auth-id'] : ''; 
    $result = mysqli_query($conn,"SELECT * FROM orders  WHERE  order_rider_id = '".$_SESSION["auth-id"]."' ");

    while($row = mysqli_fetch_array($result)){
        if ($row["status"] != 'สำเร็จแล้ว') {
        echo '    
        <a href="?page=showjob2&&OrderID='.$row["order_id"].'" class="text-dark" style="text-decoration:none">
            <div class="card mx-auto" style="">
            <div class="card-body">
                <h5 class="card-title">ออเดอร์ : '.$row["order_key"].' <p> โดย '.$row["order_name"].'</p> </h5>
                <h6 class="card-subtitle mb-2 text-muted">วันที่: '.$row["order_date"].'</h6>
                <p class="card-text">สถานะ: '.$row["status"].'</p>
            </div>
            </div>
        </a> ';
        }
    }

    ?>
    
    </div>
<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

