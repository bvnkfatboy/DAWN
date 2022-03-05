
<?php include_once('include/navbar.php') ?>

<style>
.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}

.btn-back {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
        color:white;
    }

.btn-back:hover{
    background-color: whitesmoke;
    color: black;

}

.warpper{
	width:100%;
	height:50px;
	background:whitesmoke;
	margin-top:30px

}

.bartotal{
	height:100%;
}

.btn-checkout{

	margin-left:80%;
}

.sumtotal{
	margin-top:5px;
}
</style>

<?php

if(!isset($_SESSION["intLine"]))
{
?>
      <div class="d-flex align-items-center justify-content-center" style="height: 350px">
       <p>
         <h1>ไม่มีสินค้าในตะกร้า</h1>
        </p>
      </div>

<?php
	exit();
}

?>
ิ
<div class="container">

<br>
<h2 class="ml-4">ตะกร้าสินค้า</h2>
<table id="cart" class="table table-hover table-condensed">
	<thead>
		<tr>
			<th style="width:60%">ชื่อสินค้า</th>
			<th style="width:10%">ราคา</th>
			<th style="width:10%"></th>
			<th style="width:10%" class="text-center">ราคารวม</th>
			<th style="width:10%"></th>
		</tr>
	</thead>
	<tbody>



	<?php
	$Total = 0;
	$SumTotal = 0;
	include_once('config.inc.php');

	for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
	{
		if($_SESSION["strProductID"][$i] != "")
		{

		$strSQL = "SELECT * FROM product WHERE pro_id = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysqli_query($conn,$strSQL);
		$objResult = mysqli_fetch_array($objQuery);
		$pricetrue = $objResult["pro_price"];
		$Total = $_SESSION["strQty"][$i] * $pricetrue;
		

		
		$SumTotal = $SumTotal + $Total;


	?>

		<tr>
			<td data-th="Product">
				<div class="row">
					<div class="col-md-3"><img src="<?php echo $objResult['pro_image']; ?>"  style="max-width:100px"/></div>
					<div class="col-md-9">
						<p class="nomargin mt-1"><?php echo $objResult['pro_name']; ?></p>
					</div>
				</div>
			</td>
			<td data-th="Price"><?php echo number_format($objResult['pro_price'],2); ?></td>
			<td data-th="Quantity">
				<p class="text-center"><?php echo $_SESSION["strQty"][$i];?></p>
			</td>
			<td data-th="Subtotal" class="text-center"><?php echo number_format($Total,2);?></td>
			<td class="actions" data-th="">
			
				<!-- <a href="?page=order_delete&&Line=<?php echo $i;?>" class="btn btn-clear btn-back btn-clear">ลบ</a>			 -->
			</td>
		</tr>

		<?php
	  }
  }
  ?>
	</tbody>

</table>

<div class="warpper">
<div class="row h-100">
        <div class="col-sm-12 my-auto ">
			
            <!-- <b class="ml-3 sumtotal float-right">สินค้าทั้งหมด: <?php echo number_format($SumTotal,2);?> บาท</b> -->


			
        </div>
		
    </div>
</div>

<?php

$sql = "SELECT * FROM account WHERE acc_id = '".$_SESSION["auth-id"]."' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

?>
<hr>
<div class="row">

<div class="col-md-6 mt-5">                
  <form action=""  class="ml-5 " method="post">
                <div class="form-group">
                <label>ราคาสินค้า : <b><?php echo number_format($SumTotal,2);?></b>  บาท</label>
                </div>

                <div class="form-group">
                    <label>ค่าขนส่ง : <b>70</b>  บาท</label>
                </div>
                <div class="form-group">
                    <label>รวม : <b><?php echo number_format($SumTotal+70,2);?></b> บาท</label>
                </div>
  </form>
</div>
<div class="col-md-6 mt-5 ">
        
<form action="?page=save_checkout" method="post" class="mx-auto"style="width:350px" enctype="multipart/form-data">  
                <input type="text"  name="order_shiping" class="form-control" required="required" value="บริษัทขนส่ง" hidden >
                <input type="text"  name="order_status" class="form-control" required="required" value="รอชำระเงิน" hidden >
                <div class="form-group">
                    <label >รายละเอียด</label>
                </div>

                <div class="form-group">
                    <label >ชื่อ:</label>
                    <input type="text"  name="order_name" class="form-control" required="required" value="<?php echo $row['acc_name'];?>" >
                </div>
                <div class="form-group">
                    <label> อีเมล:</label>
                    <input type="email"  name="order_email" class="form-control" required="required" readonly value="<?php echo $row['acc_email'];?>" >
                </div>
                <div class="form-group">
                    <label> เบอร์โทร:</label>
                    <input type="text"  name="order_tal" class="form-control" required="required" value="<?php echo $row['acc_phone'];?>" >
                </div>
                <div class="form-group">
                    <label >ที่อยู่</label>
                    <textarea class="form-control" name="order_address" required="required"  rows="3"><?php echo $row['acc_address'];?></textarea>
                </div>
                <div class="form-group">

                    <!-- <a href="?page=order&&ProductID=" class="btn btn-primary btn-block btn-back ">เพิ่มลงตะกร้า</a> -->
                    
                </div>
                <input type="submit" class="btn btn-primary btn-block btn-back mx-auto mb-5" name="order_submit" value="สั่งซื้อสินค้า">
</form>

</div>
</div>

    
</div>





















<?php include_once('include/footer.php') ?>