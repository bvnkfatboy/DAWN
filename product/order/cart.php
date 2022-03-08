
<?php include_once('include/navbar.php');?>

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
	height:105px;
	background:whitesmoke;
	/* margin-top:30px */

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
		$Total = ($_SESSION["strQty"][$i] * $pricetrue);
		

		
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
				<p class="text-center" style="margin-top: 15px;"><?php echo $_SESSION["strQty"][$i];?></p>
			</td>
			<td data-th="Subtotal" class="text-center"><?php echo number_format($Total,2);?></td>
			<td class="actions" data-th="">
			
				<a href="?page=order_delete&&Line=<?php echo $i;?>" onClick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?')" class="btn btn-clear btn-back btn-clear">ลบ</a>			
			</td>
		</tr>

		<?php
	  }
  }
  ?>
	</tbody>

</table>

<?php 
if (isset($_POST['cart-next'])) {
	$cart_choice = $_POST['cart-choice'];
	
	if ($cart_choice == "บริษัทขนส่ง") {
	?>
        <script>
				Swal.fire({
				title: 'ดำเนินการถัดไปหรือไม่?',
				text: "คุณพร้อมจะดำเนินการขั้นตอนตอนไปหรือไม่",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'ตกลง',
				cancelButtonText: 'ยกเลิก'
				}).then((result) => {
				if (result.isConfirmed) {
					location.href='?page=checkout';
				}
				})
        </script>
		
	<?php 
	} elseif ($cart_choice == "เดลิเวอรี่") {
		?>
        <script>
				Swal.fire({
				title: 'ดำเนินการถัดไปหรือไม่?',
				text: "คุณพร้อมจะดำเนินการขั้นตอนตอนไปหรือไม่",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'ตกลง',
				cancelButtonText: 'ยกเลิก'
				}).then((result) => {
				if (result.isConfirmed) {
					location.href='?page=checkout2';
				}
				})
        </script>
		
	<?php 
	} else {
		?>
        <script>
				Swal.fire({
				title: 'ดำเนินการถัดไปหรือไม่?',
				text: "คุณพร้อมจะดำเนินการขั้นตอนตอนไปหรือไม่",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'ตกลง',
				cancelButtonText: 'ยกเลิก'
				}).then((result) => {
				if (result.isConfirmed) {
					location.href='?page=checkout3';
				}
				})
        </script>
		
	<?php 
	}
	
	
}
?>

<div class="warpper">
	
<div class="row h-100">
        <div class="col-sm-12 my-auto ">
  			<form action="" method="post">
				  
  				<div class="cart-ck" style="display: flex; margin-bottom:10px">
					<b class="ml-3 sumtotal">เลือกประเภทบริการ: </b>
					<select id="cart-choice" name="cart-choice" class="form-control" style="max-width: 300px;margin-left:10px;" >
						<option>บริษัทขนส่ง</option>
						<option>เดลิเวอรี่</option>
						<option>รับที่ร้าน</option>
					</select> 
					<b class="ml-3 sumtotal">** ในกรณีที่สั่งเครื่องดื่มไม่สามารถใช้บริษัทขนส่งได้ **</b>
				  </div>

				<!-- <br> -->
				<b class="ml-3 sumtotal">สินค้าทั้งหมด: <?php echo number_format($SumTotal,2);?> บาท</b>
				<button type="submit" name="cart-next" class="btn btn-clear btn-back btn-clear ml-5">ถัดไป</button>
				<!-- <a href="?page=checkout" class="btn btn-clear btn-back btn-clear ml-5">ถัดไป</a> -->
				<a href="?page=cart_clear" class="btn btn-clear btn-back ml-3">เคลียร์ตะกร้า</a>
			</form>
        </div>
    </div>
</div>
</div>























<?php include_once('include/footer.php') ?>