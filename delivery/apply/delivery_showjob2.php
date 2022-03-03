<?php

include_once('include/navbar.php');

$check_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : ''; 

if($check_admin != 'member' ){

?>


<style>
    .btn-back {        
        max-width: 180px;
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
<?php include_once('config.inc.php') ?>
<div class="container">

<a href="?page=delivery" class="btn btn-primary btn-block btn-back">กลับหน้าพนักงาน</a><br>

<div class="row">
    <div class="col-md-12">
    <table id="cart" class="table table-hover table-condensed">
	<thead>
		<tr>
			<th style="width:60%">Product</th>
			<th style="width:10%">Price</th>
			<th style="width:10%">Quantity</th>
			<th style="width:10%" class="text-center">Subtotal</th>
			<th style="width:10%"></th>
		</tr>
	</thead>
	<tbody>

        <?php

            $Total = 0;
            $SumTotal = 0;

            $strSQL2 = "SELECT * FROM orders_detail WHERE order_id = '".$_GET["OrderID"]."' ";
            $objQuery2 = mysqli_query($conn,$strSQL2);
            
            while( $objResult2 = mysqli_fetch_array($objQuery2) )
            {
                    $strSQL3 = "SELECT * FROM product WHERE pro_id = '".$objResult2["pro_id"]."' ";
                    $objQuery3 = mysqli_query($conn,$strSQL3);
                    $objResult3 = mysqli_fetch_array($objQuery3);
                    $Total = $objResult2["qty"] * $objResult3["pro_price"];
                    $SumTotal = $SumTotal + $Total;
                ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">

                            <div class="col-md-9">
                                <p class="nomargin mt-1"><?php echo $objResult3['pro_name']; ?></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?php echo number_format($objResult3['pro_price'],2); ?></td>
                    <td data-th="Quantity">
                        <p class="text-center"><?php echo  $objResult2['qty']; ?></p>
                    </td>
                    <td data-th="Subtotal" class="text-center"><?php echo number_format($Total,2);?></td>
                    <td class="actions" data-th="">
	
                    </td>
                </tr>
                <?php
            }
        ?>


	</tbody>

</table>

<?php 

$strSQL = "SELECT * FROM orders WHERE order_id = '".$_GET["OrderID"]."' ";
$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery);

?>
<hr>
<div class="row">

<div class="col-md-6 mt-5">                
  <form action=""  class="ml-5 " method="post">
                <div class="form-group">
                <label>เลขออเดอร์ : <b><?php echo  $objResult['order_key'];?></b> </label>
                </div>
                <div class="form-group">
                <label>ราคาสินค้า : <b><?php echo number_format($SumTotal,2);?></b>  บาท</label>
                </div>

                <div class="form-group">
                    <label>ค่าขนส่ง : <b>20</b>  บาท</label>
                </div>
                <div class="form-group">
                    <label>รวม : <b><?php echo number_format($SumTotal+20,2);?></b> บาท</label>
                </div>

                <div class="form-group">
                    <label>สถานะสั่งซื้อ : <b><?php echo $objResult['status'];?></b></label>
                </div>
                <div class="form-group">
                    <label>การให้บริการ : <b><?php echo $objResult['order_shiping'];?></b></label>
                </div>
                <?php 
                $delivery = "SELECT * FROM delivery WHERE order_id = '".$_GET["OrderID"]."' ";
                $delivery_query = mysqli_query($conn,$delivery);
                $delivery_row = mysqli_fetch_array($delivery_query);
                ?>
                <div class="form-group">
                    <label>ชื่อไรเดอร์ : <b><?php echo $delivery_row['delivery_name'];?></b></label>
                </div>

  </form>
</div>
<div class="col-md-6 mt-5 ">
        
<form action="?page=save_checkout" method="post" class="mx-auto"style="width:350px" enctype="multipart/form-data">  

                <div class="form-group">
                    <label >รายละเอียด</label>
                </div>

                <div class="form-group">
                    <label >ชื่อ:</label>
                    <p><?php echo $objResult['order_name'];?></p>
                </div>
                <div class="form-group">
                    <label> อีเมล:</label>
                    <p><?php echo $objResult['order_email'];?></p>
                </div>
                <div class="form-group">
                    <label> เบอร์โทร:</label>
                    <p><?php echo $objResult['order_tal'];?></p>
                </div>
                <div class="form-group">
                    <label >ที่อยู่</label>
                    <p><?php echo $objResult['order_address'];?></p>
                </div>
                
                <div class="form-group">

                    <!-- <a href="?page=order&&ProductID=" class="btn btn-primary btn-block btn-back ">เพิ่มลงตะกร้า</a> -->
                    
                </div>
                <!-- <input type="submit" class="btn btn-primary btn-block btn-back mx-auto" name="order_submit" value="สั่งซื้อสินค้า"> -->
</form>

</div>
</div>

    </div>
  
</div>

<a href="?page=delivery_app2&&OrderID=<?php echo $objResult['order_id'] ?>&&order_key=<?php echo $objResult['order_key'] ?>" class="btn btn-primary btn-block btn-back">ส่งมอบเรียบร้อย</a>
<a href="?page=delivery_deapp&&OrderID=<?php echo $objResult['order_id'] ?>&&order_key=<?php echo $objResult['order_key'] ?>" class="btn btn-primary btn-block btn-back">ยกเลิกออเดอร์</a>
    
</div>
<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

