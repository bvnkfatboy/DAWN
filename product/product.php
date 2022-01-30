<?php
include_once('config.inc.php');
include_once('include/navbar.php');
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



    .btn:hover, .btn-back:hover{
        background-color: whitesmoke;
        color: black;

    }


</style>

<?php

$sql = "SELECT * FROM product WHERE pro_id='".$_GET["pro_id"]."' ";
// $sql = "SELECT * FROM product WHERE pro_id=1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);

?>

<a href="#" onclick="window.history.back();" class="btn btn-primary btn-block btn-back">กลับหน้าร้าน</a><br>

<div class="row mt-5">
<div class="col-md-7">
    <img  class="mx-auto d-block" width="400px" src="<?php echo $row['pro_image'];?>">
</div>
<div class="col-md-5 mt-5 ">
        
<form action="" method="post" class="ml-5" enctype="multipart/form-data">  

                <div class="form-group">
                <label>ชื่อสินค้า</label>
                    <p><?=$pro_name ?></p>
                </div>
  

                <div class="row">
                    <div class="col-md-6">              
                        <div class="form-group">
                        <label>ราคาสินค้า</label>
                            <p><?=$pro_price ?></p>
                        </div>
                    </div>

                    <div class="col-md-6">                
                        <div class="form-group">
                            <label>ไซต์</label>

                            <p><?=$pro_size ?></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label >รายละเอียด</label>
                    <p><?=$pro_detail ?></p>
                </div>

                <div class="form-group">

                    <a href="?page=order&&ProductID=<?=$pro_id ?>" class="btn btn-primary btn-block btn-back ">เพิ่มลงตะกร้า</a>
                </div>
            </form>

</div>
</div>

<?php include_once('include/footer.php');?>