<?php include_once('include/navbar.php')?>
<?php if(isset($_SESSION['auth-id'])){?>
<style>

    .title-menu{
        
        margin-top: 25px;
    }

    .user-info p{
        margin-left: 20px;
    }

    .btn {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
    }

    .btn:hover{
        background-color: whitesmoke;
        color: black;

    }

</style>
<?php
include('config.inc.php');
$sql = "SELECT * FROM account WHERE acc_id='".$_SESSION["auth-id"]."' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);

?>
<div class="container">
    

<div class="container-fluid">
    <div class="user-info">
        <div class="row">
            <div class="col-md-6">
            <div class="user-name">
                <h4 class="title-menu">รายละเอียดบัญชี</h4>
                <p>ชื่อ - นามสกุล: <?=$acc_name?></p>
                <p>อีเมล: <?=$acc_email?></p>
                <p>เบอร์โทรศัพท์: <?=$acc_phone?></p>
            </div>
            <div class="user-addre">
                <h4 class="title-menu">รายละเอียดที่อยู่</h4>
                <p><?=$acc_address?></p>

            </div>
            <a href="?page=edit_profile" class="btn btn-primary btn-block">แก้ไขบัญชี</a>
            </div>
            <div class="col-md-6">
            <h4 class="title-menu">รายการสั่งซื้อสินค้า             <a href="?page=payment" class="btn btn-primary btn-block float-right">ชำระเงิน</a></h4>
            <br>


<?php
                    $order_sql = "SELECT * FROM orders WHERE order_email='".$acc_email."' ";
                    $result_order = mysqli_query($conn, $order_sql);
                    // $order = mysqli_fetch_array($result_order);
                    // $ordercheckemail = isset($order['order_email']);
                    

                    while($orders = mysqli_fetch_array($result_order)){
                    echo '    
                    <a href="?page=orders&&OrderID='.$orders["order_id"].'" class="text-dark" style="text-decoration:none">
                        <div class="card mx-auto" style="">
                        <div class="card-body">
                            <h5 class="card-title">ออเดอร์ : '.$orders["order_key"].'</h5>
                            <h6 class="card-subtitle mb-2 text-muted">วันที่: '.$orders["order_date"].'</h6>
                            <p class="card-text">สถานะ: '.$orders["status"].'</p>
                        </div>
                        </div>
                    </a> ';
                    }
?>

            </div>
        </div>
    </div>
</div>
</div>

<?php }?>

<?php include_once('include/footer.php')?>
