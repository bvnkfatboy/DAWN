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

    .btn-proinsert {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
        margin-left:auto;
        margin-right:30px;
    }

    .btn-proinsert:hover{
        background-color: whitesmoke;
        color: black;

    }

</style>
ิ<div class="container">

<a href="?page=admin" class="btn btn-primary btn-block btn-back">กลับหน้าหลังบ้าน</a>
<hr>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
            <h4>หมวดหมู่สินค้า</h4>
            <div class="list-group list-group-flush">
            <a href="?page=admin_product&&catalog=all" class="list-group-item list-group-item-action">- สินค้าทั้งหมด</a>
            <a href="?page=admin_product&&catalog=drink" class="list-group-item list-group-item-action">- เครื่องดื่ม</a>
            <a href="?page=admin_product&&catalog=bean" class="list-group-item list-group-item-action">- เมล็ดกาแฟ</a>
            <a href="?page=admin_product&&catalog=mug" class="list-group-item list-group-item-action">- แก้วกาแฟ</a>
            <a href="?page=admin_product&&catalog=more" class="list-group-item list-group-item-action">- อื่น</a>
            </div>
		</div>
		<div class="col-md-10">
            <a href="?page=product_insert" class="btn btn-primary btn-block btn-proinsert">เพิ่มสินค้า</a>
            <?php
            $current_page = isset($_GET['catalog']) ? $_GET['catalog'] : 'all' ;
            switch ($current_page) {

                case ('all'):
                    include_once 'admin/product/catalog/c_all.php';
                    $title = "หลังร้าน - DAWN (Cafe & Bar)";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                case ('drink'):
                    include_once 'admin/product/catalog/c_drink.php';
                    $title = "หลังร้าน - DAWN (Cafe & Bar)";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                case ('bean'):
                    include_once 'admin/product/catalog/c_bean.php';
                    $title = "หลังร้าน - DAWN (Cafe & Bar)";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                case ('mug'):
                    include_once 'admin/product/catalog/c_mug.php';
                    $title = "หลังร้าน - DAWN (Cafe & Bar)";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                case ('more'):
                    include_once 'admin/product/catalog/c_more.php';
                    $title = "หลังร้าน - DAWN (Cafe & Bar)";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
                    break;
                // case ('outerwear'):
                //     include_once 'admin/product/catalog/c_outerwear.php';
                //     $title = "หลังร้าน - DAWN (Cafe & Bar)";
                //     $output = str_replace('%TITLE%', $title, $output);
                //     echo $output;
                //     break;

        
                default:
                    include_once 'error404.php';
                    $title = "ERROR PAGE - DAWN (Cafe & Bar)";
                    $output = str_replace('%TITLE%', $title, $output);
                    echo $output;
            };

            ?>
		</div>
	</div>
</div>
    
</div>
<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

