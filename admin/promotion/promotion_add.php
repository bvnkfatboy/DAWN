<?php

include_once('config.inc.php');
include_once('include/navbar.php');

$check_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : ''; 

if($check_admin == 'admin' ){


    if (isset($_POST['pro-insert'])) {


        $pro_name = $_POST['pro-name'];
        $pro_detail = $_POST['pro-detail'];


        
        if($_FILES['inputfile']['name'] != ""){

            $path = "promotion/img/";
            $type = strrchr($_FILES['inputfile']['name'],".");
            $file = md5(date('Y-m-d H:i:s')).$type;
            $path_copy = $path.$file;
            move_uploaded_file($_FILES['inputfile']['tmp_name'],$path_copy);

            $sql = "INSERT INTO promotion (pro_name,pro_detail,pro_img)
                    VALUES ('$pro_name',' $pro_detail ',' $path_copy') ";
            $query = mysqli_query($conn, $sql);
            // header('location: ?page=product_insert');
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
                        location.href='?page=admin_promotion';

                    }
                })
            </script>
            <?php }
        } else {?>

        <script>
            Swal.fire({
                title: 'ข้อมูลของคุณไม่ถูกต้อง',
                text:'คุณไม่ได้เพิ่มรูป, โปรดลองอีกครั้ง',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: `ตกลง`,
            }).then((result) => {

                if (result.isConfirmed) {
                    header('location: ?page=admin_promotion');

                }
            })
        </script>


       <?php }



    }




?>


<style>
    .btn-back {        
        max-width: 170px;
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
<div class="container">

<a href="?page=admin_promotion" class="btn btn-primary btn-block btn-back">กลับหน้าจัดการโปรโมชั่น</a><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
            <div class="warpper">
                    <div class="zoneupload">
                            <div class="image">
                                <img src="dist/img/add_image.svg" id="imgs">
                            </div>

                           
                    </div>
                    <button type="button" onclick="uploadpic()" class="btn btn-primary btn-block btn-upload mx-auto">อัพโหลดรูป</button>
                    
            </div>
		</div>
		<div class="col-md-5">
        <div class="login-form">

        
            <form action="" method="post" enctype="multipart/form-data">  
            <input type="file" name="inputfile" id="inputfile" hidden>
                <div class="form-group">
                <label>ชื่อโปรโมชั่น</label>
                    <input type="text" class="form-control"  name="pro-name" required="required">
                </div>
  
                <div class="form-group">
                    <label >รายละเอียด</label>
                    <textarea class="form-control"  name="pro-detail"  rows="10"></textarea>
                </div>


                <div class="form-group">
                    <button type="submit" name="pro-insert" class="btn btn-primary btn-block">เพิ่มโปรโมชั่น</button>
                </div>
            </form>

		</div>
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

