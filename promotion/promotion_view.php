<?php include_once('include/navbar.php') ?>





<style>
.promotion {
    width: 100%;
    height: 100vh;
}
.promotion_header{
    margin-top: 100px;
}

.promotion_img img {
  width: 100%;
}
.promotion_detail {
    margin-top: 40px;
}
</style>

<?php

$sql = "SELECT * FROM promotion WHERE pro_id='".$_GET["pro_id"]."' ";
// $sql = "SELECT * FROM product WHERE pro_id=1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);

?>

<div class="container">

<div class="promotion">
    <div class="promotion_header">
        <h2> <?=$pro_name?> </h2>
        <small style="color: gray;">วันที่ประกาศ: <?=$pro_date?> </small>
        <hr>
    </div>
    

    <div class="promotion_img">
        <img src="<?=$pro_img?>">
    </div>

    <div class="promotion_detail">
        <h6><?=$pro_detail?></h6>
    </div>
</div>

</div>