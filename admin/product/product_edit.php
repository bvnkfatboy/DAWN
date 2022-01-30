<?php

include_once('config.inc.php');
include_once('include/navbar.php');

$check_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : ''; 


    if($check_admin == 'admin'){


        if (isset($_POST['pro-update'])) {

            $pro_id = $_POST['pro-id'];
            $pro_name = $_POST['pro-name'];
            $pro_price = $_POST['pro-price'];
            $pro_size = $_POST['pro-size'];
            $pro_detail = $_POST['pro-detail'];
            $pro_type = $_POST['pro-type'];

            
            if($_FILES['inputfile']['name'] != ""){

                $path = "dist/img/product/";
                $type = strrchr($_FILES['inputfile']['name'],".");
                $file = md5($pro_name.date('Y-m-d H:i:s')).$type;
                $path_copy = $path.$file;
                move_uploaded_file($_FILES['inputfile']['tmp_name'],$path_copy);

                $sql = "UPDATE product SET pro_name ='".$pro_name."',
                                        pro_price ='".$pro_price."', 
                                        pro_size ='".$pro_size."', 
                                        pro_detail ='".$pro_detail."', 
                                        pro_image ='".$path_copy."', 
                                        pro_type ='".$pro_type."'
                                        WHERE pro_id ='".$pro_id."' ";
                $query = mysqli_query($conn, $sql);
                // header('location: ?page=product_insert');
            } else {
                $sql = "UPDATE product SET pro_name ='".$pro_name."',
                                        pro_price ='".$pro_price."', 
                                        pro_size ='".$pro_size."', 
                                        pro_detail ='".$pro_detail."', 
                                        pro_type ='".$pro_type."'
                                        WHERE pro_id ='".$pro_id."' ";
                $query = mysqli_query($conn, $sql);
                
            }

            if($query){ ?>

            <script>
                Swal.fire({
                    title: 'สำเร็จ',
                    text:'ระบบได้อัพเดตข้อมูลของคุณเรียบร้อยแล้ว',
                    icon: 'succress',
                    showCancelButton: false,
                    confirmButtonText: `ตกลง`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='?page=admin_product';

                    }
                })
            </script>
            
            <?php } else { 
                header('Location:?page=admin_product');

            }
    }


    if (isset($_POST['pro-delete'])) {
        $removeid = $_GET['pro_id']; 
        if($removeid != ''){


            $sql = mysqli_query($conn,"DELETE FROM product WHERE pro_id = '".$removeid."' ");
    
            if($sql){
                header('Location: ?page=admin_product');

            }
    
        }
    }


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


    .btn-upload {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
        margin-top:30px;
    }



    .btn-proinsert {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
        margin-top:30px;
        margin-left:auto;
        margin-right:30px;
    }


    .btn:hover, .btn-upload:hover , .btn-back:hover , .btn-proinsert:hover{
        background-color: whitesmoke;
        color: black;

    }

    .warpper{
        height: 350px;
        width: 430px;
        position: relative;
        margin-left:auto;
        margin-right:auto;
        margin-top:50px;
    }
    .warpper .zoneupload{
        position: relative;
        height: 300px;
        width: 100%;
        border-radius: 10px;
        background: #fff;
        border: 2px dashed #c2cdda;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }


    .warpper .image{
        position: absolute;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .warpper img{
        height: 250px;
        width: 250px;
        /* object-fit: cover; */
    }

    .login-form {
        width: 450px;
        font-size: 15px;
        
    }

    .login-form a{
        color: black;
        
    }

    .login-form a:hover{
    text-decoration: none;
    
    }
    .login-form form {
        margin-bottom: 15px;


        padding: 30px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
    }
</style>

<?php
$sql = "SELECT * FROM product WHERE pro_id='".$_GET["pro_id"]."' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);

?>

<a href="?page=admin_product" class="btn btn-primary btn-block btn-back">กลับหน้าจัดการสินค้า</a><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
            <div class="warpper">
                    <div class="zoneupload">
                            <div class="image">
                                <img src="<?=$pro_image ?>" id="imgs">
                            </div>

                           
                    </div>
                    <button type="button" onclick="uploadpic()" class="btn btn-primary btn-block btn-upload mx-auto">อัพโหลดรูป</button>
                    
            </div>
		</div>
		<div class="col-md-5">
        <div class="login-form">

        
            <form action="" method="post" enctype="multipart/form-data">  
            <input type="text" name="pro-id" value="<?=$pro_id ?>" hidden>
            <input type="file" name="inputfile" id="inputfile" hidden>
                <div class="form-group">
                <label>ชื่อสินค้า</label>
                    <input type="text" class="form-control"  value="<?=$pro_name ?>" name="pro-name" required="required">
                </div>
  

                <div class="row">
                    <div class="col-md-6">              
                        <div class="form-group">
                        <label>ราคาสินค้า</label>
                            <input type="text" class="form-control " value="<?=$pro_price ?>"  name="pro-price" required="required">
                        </div>
                    </div>

                    <div class="col-md-6">                
                        <div class="form-group">
                            <label>ไซต์</label>

                            <select name="pro-size" class="form-control text-center">
                                <option> <?=$pro_size ?> </option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>NONE</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label >รายละเอียด</label>
                    <textarea class="form-control"  name="pro-detail"  rows="3"><?=$pro_detail ?></textarea>
                </div>

                <div class="form-group">
                        <label>ประเภทสินค้า</label>
                        <select name="pro-type" class="form-control text-center">
                            <option><?=$pro_type ?></option>
                            <option>OUTERWEAR</option>
                            <option>SHIRST</option>
                            <option>BOTTOMS</option>
                            <option>HEADWEAR</option>
                            <option>ACCESSORIES</option>
                            <option>MORE</option>
                        </select>
                </div>

                <div class="form-group">
                    <button type="submit" name="pro-update" class="btn btn-primary btn-block">อัพเดตสินค้า</button>
                    <button  name="pro-delete" class="btn btn-primary btn-block">ลบสินค้า</button>
                </div>
            </form>

		</div>
	</div>
</div>

<script>
    const inputfile = document.querySelector("#inputfile");
    const img = document.querySelector("#imgs");
    function uploadpic(){
        inputfile.click();
    }
    inputfile.addEventListener("change", function(){

        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(){
                const result = reader.result;
                img.src = result;
            }
            reader.readAsDataURL(file);
        }

    });
    

</script>
<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

