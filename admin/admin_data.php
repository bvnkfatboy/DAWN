<?php

include_once('include/navbar.php');

$check_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : ''; 

if($check_admin == 'admin' ){

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


    .btn-edit{
        max-width: 100px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        color:white;
        border: 1px black;
    }

    .btn-edit:hover{
        background-color: whitesmoke;
        color: black;

    }




</style>
<a href="?page=admin" class="btn btn-primary btn-block btn-back">กลับหน้าหลังบ้าน</a><br>


<h1 class="text-center">ข้อมูลออเดอร์</h1>

<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <h4>หมวดหมู่</h4>
            <div class="list-group list-group-flush">
            <h5>ข้อมูลออเดอร์</h5>
            <a href="?page=admin_data&&list_order=ทั้งหมด" class="list-group-item list-group-item-action">- ทั้งหมด</a>
            <a href="?page=admin_data&&list_order=รอชำระเงิน" class="list-group-item list-group-item-action">- รอชำระเงิน</a>
            <a href="?page=admin_data&&list_order=รอตรวจสอบ" class="list-group-item list-group-item-action">- รอตรวจสอบ</a>
            <a href="?page=admin_data&&list_order=สำเร็จแล้ว" class="list-group-item list-group-item-action">- สำเร็จแล้ว</a>
            </div>


		</div>
		<div class="col-md-10">

            <?php
            $current_page = isset($_GET['list_order']) ? $_GET['list_order'] : 'ทั้งหมด' ;
            switch ($current_page) {

                case ('ทั้งหมด'):
                    include_once 'admin/orders/order_all.php';
                    $title = "หลังร้าน - A.T.E";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                case ('รอชำระเงิน'):
                    include_once 'admin/orders/order_wpay.php';
                    $title = "หลังร้าน - A.T.E";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                case ('รอตรวจสอบ'):
                    include_once 'admin/orders/order_wadmin.php';
                    $title = "หลังร้าน - A.T.E";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                case ('สำเร็จแล้ว'):
                    include_once 'admin/orders/order_succress.php';
                    $title = "หลังร้าน - A.T.E";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
        
                default:
            };

            ?>

		</div>
	</div>
</div>

<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

