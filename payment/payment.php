



<style>
    .login-form {
        width: 450px;
        margin: 50px auto;
        font-size: 15px;
        
    }

    .login-form a {
        color: black;

    }

    .login-form a:hover {
        text-decoration: none;

    }

    .login-form form {
        margin-bottom: 15px;


        padding: 30px;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control,
    .btn {
        min-height: 38px;
        border-radius: 2px;
    }

    .btn {
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
    }

    .btn:hover {
        background-color: whitesmoke;
        color: black;

    }
    label {
        
    }
</style>


<?php include_once('include/navbar.php') ?>

<?php
include_once('config.inc.php');

if(isset($_POST['pay-app'])){
    $pay_name = $_POST['pay-name'];
    $pay_date = $_POST['pay-date'];
    $pay_bank = $_POST['pay-bank'];
    $pay_key  = $_POST['pay-key'];
    

    $sql = "SELECT * FROM orders Where order_key ='" . $pay_key . "' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $check = isset($row['order_key']);
    if( $check == $pay_key){
        if($_FILES['pay-img']['name']!=""){
            $path = "payment/temp/";
            $type = strrchr($_FILES['pay-img']['name'],".");
            $file = md5($pay_key.$pay_date).$type;
            $path_copy = $path.$file;
            move_uploaded_file($_FILES['pay-img']['tmp_name'],$path_copy);

            $sql = "INSERT INTO payment (pay_date,pay_name,pay_bank,order_key,pay_status,pay_img)
                    VALUE (
                        '$pay_date',
                        '$pay_name',
                        '$pay_bank',
                        '$pay_key',
                        'รอการยืนยัน',
                        '$path_copy'
                    )";
            $query = mysqli_query($conn,$sql);
            $sql2 = "UPDATE orders SET status = 'พนักงานกำลังตรวจสอบ' WHERE order_key ='".$pay_key."' ";
            $query2 = mysqli_query($conn,$sql2);
            if($query){?>
                <script>
                    Swal.fire({
                        title: 'สำเร็จ',
                        text:'รอการยืนยันจากพนักงาน',
                        icon: 'succress',
                        showCancelButton: false,
                        confirmButtonText: `ตกลง`,
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.href = '?page=profile';
                
                        }
                    })
                </script>
            <?php }
        } else {
            header('location: ?page=payment');
        }
    }else { ?>
        <script>
            Swal.fire({
                title: 'ข้อมูลของคุณไม่ถูกต้อง',
                text:'เนื่องจากมีข้อมูลซ้ำ, โปรดลองอีกครั้ง',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: `ตกลง`,
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.href = '?page=payment';
           
                }
            })
        </script>
    <?php }
}
?>
<div class="login-form">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label >ชื่อ - นามสกุล</label>
            <input type="text" class="form-control"  name="pay-name" required="required">
        </div>
        <div class="form-group">
        <label >วันที่โอน</label>
            <input class="form-control" type="datetime-local"  name="pay-date">
        </div>
        <div class="form-group">
        <label >ธนาคารที่โอน</label>

                <select  class="form-control" name="pay-bank">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
        </div>

        <div class="form-group">
        <label >เลขออเดอร์</label>
            <input type="text" class="form-control"  name="pay-key" required="required">
        </div>

        <div class="form-group">
        <label >สลิป</label>
            <input class="form-control" type="file"  name="pay-img" required="required">
        </div>
 
 <br>
        <div class="form-group">
            <button type="submit" name="pay-app" class="btn btn-primary btn-block">CREATE</button>
        </div>

    </form>
    <p class="text-center"><a href="?page=home">Return to Store</a></p>
</div>

<?php include_once('include/footer.php') ?>