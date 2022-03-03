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
    .column_pro {
  float: left;
  width: 20%;
  padding: 0 15px;

  padding-bottom:15px;

}

.row_pro {margin: 0; margin-top:15px;}


.row_pro:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 900px) {
  .column_pro {
    width: 50%;

  }
}

@media screen and (max-width: 600px) {
  .column_pro {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}


.product_cards {

  padding: 16px;
  text-align: center;


}

.product_cards p {
    
    font-size: 14px;
    word-wrap: break-word;
}


.product_cards img {
  display:block;
  width:100%;
  margin-left:auto;
  margin-right:auto;
}
.product_name{
    height: 25px;
    width: 100%;
    margin-top: 10px;
}

.btn-editpro {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
        
        margin-left:auto;
        margin-right:auto;
}


 .btn-editpro:hover{
    background-color: whitesmoke;
    color: black;

}


</style>
ิ<div class="container">

<a href="?page=admin" class="btn btn-primary btn-block btn-back">กลับหน้าหลังบ้าน</a>
้<h4 class="text-center">หน้าจัดการโปรโมชั่น</h4>
<hr>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            <a href="?page=promotion_add" class="btn btn-primary btn-block btn-proinsert">เพิ่มโปรโมชั่น</a>
            <div class="row_pro">

<?php
    include_once('config.inc.php');
    $result = mysqli_query($conn,"SELECT * FROM promotion ORDER BY pro_id");

    while($row = mysqli_fetch_array($result)){
        echo '
        <div class="column_pro">
            <div class="product_cards">
                <img  width="336px" src="'.$row['pro_img'].'">
                <div class="product_name"><b class="product_text">'.$row['pro_name'].'</b></div>
                
            </div>
            <a href="?page=promotion_view&&pro_id='.$row['pro_id'].'" class="btn btn-primary btn-block btn-editpro">ดูรายละเอียด</a>
            <a href="?page=promotion_edit&&pro_id='.$row['pro_id'].'" class="btn btn-primary btn-block btn-editpro">แก้ไขโปรโมชั่น</a>
        </div> 
        
        ';

    }

?>

<!-- <div class="column">
<div class="product_cards">
    <img  width="336px" src="dist/img/product/1.jpg">
    <div class="product_name"><p class="product_text">Some text</p></div>
</div>
</div> -->

</div>

		</div>
	</div>
</div>
    
</div>
<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

