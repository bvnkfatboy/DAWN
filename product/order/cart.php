
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


<br>
<h2 class="ml-4">SHOPPING CART</h2>
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
						<small>ไซต์: <?php echo $objResult['pro_size']; ?></small>
					</div>
				</div>
			</td>
			<td data-th="Price"><?php echo number_format($objResult['pro_price'],2); ?></td>
			<td data-th="Quantity">
				<p class="text-center"><?php echo $_SESSION["strQty"][$i];?></p>
			</td>
			<td data-th="Subtotal" class="text-center"><?php echo number_format($Total,2);?></td>
			<td class="actions" data-th="">
			
				<a href="?page=order_delete&&Line=<?php echo $i;?>" class="btn btn-clear btn-back btn-clear">ลบ</a>			
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
			
            <b class="ml-3 sumtotal">สินค้าทั้งหมด: <?php echo number_format($SumTotal,2);?> บาท</b>
			<a href="?page=checkout" class="btn btn-clear btn-back btn-clear ml-5"> CHECK OUT</a>
			<a href="?page=cart_clear" class="btn btn-clear btn-back ml-3"> CLEAR CART</a>
			
        </div>
		
    </div>
</div>
























<?php include_once('include/footer.php') ?>