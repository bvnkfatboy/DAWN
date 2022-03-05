<?php include_once('include/navbar.php')?>
<?php if(isset($_SESSION['auth-id'])){ ?>

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
</style>
<?php 

include('config.inc.php');

if (isset($_POST['auth-update'])) {

    $auth_id = $_POST['auth-id'];
    $auth_name = $_POST['auth-name'];
    $auth_email = $_POST['auth-email'];
    $auth_address = $_POST['auth-address'];
    $auth_phone = $_POST['auth-phone'];

    $sql = "UPDATE account SET acc_name ='".$auth_name."',
                               acc_email ='".$auth_email."',
                               acc_address ='".$auth_address."',
                               acc_phone ='".$auth_phone."'
                               WHERE acc_id ='".$auth_id."' ";
    $suc = mysqli_query($conn, $sql);
    if($suc){ ?>
        <script>
            Swal.fire({
                title: 'สำเร็จ',
                text:'ระบบได้อัพเดตข้อมูลของคุณเรียบร้อยแล้ว',
                icon: 'succress',
                showCancelButton: false,
                confirmButtonText: `ตกลง`,
            }).then((result) => {

                if (result.isConfirmed) {
                    location.href='?page=profile';

                }
            })
        </script>
    <?php } else { ?>
        <script>
            Swal.fire({
                title: 'ไม่สำเร็จ',
                text:'ระบบได้อัพเดตข้อมูลของคุณเรียบร้อยแล้ว',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: `ตกลง`,
            }).then((result) => {

                if (result.isConfirmed) {
                    location.href='?page=profile';

                }
            })
        </script>
   <?php }
}

?>


<?php
$sql = "SELECT * FROM account WHERE acc_id='".$_SESSION["auth-id"]."' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);

?>

<div class="login-form">
    <form action="" method="post">

    <input type="hidden" class="form-control"  value="<?=$acc_id ?>" id="auth-id" name="auth-id" >
        <div class="form-group">
        <label for="auth-name">ชื่อ - นามสกุล</label>
            <input type="text" class="form-control" placeholder="กรอกชื่อ - นามสกุล" value="<?=$acc_name ?>" id="auth-name" name="auth-name" required="required">
        </div>
        <div class="form-group">
        <label for="auth-email">อีเมล</label>
            <input type="email" class="form-control" placeholder="กรอกอีเมล" value="<?=$acc_email ?>" id="auth-email" name="auth-email" required="required">
        </div>
        <div class="form-group">
            <label for="auth-address">ที่อยู่</label>
            <textarea class="form-control" id="auth-address" name="auth-address"  rows="3"><?=$acc_address ?></textarea>
        </div>
        <div class="form-group">
        <label for="auth-phone">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" placeholder="Phone" value="<?=$acc_phone ?>" id="auth-phone" name="auth-phone" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="auth-update" class="btn btn-primary btn-block">แก้ไขข้อมูล</button>
        </div>

    </form>
    <p class="text-center"><a href="?page=profile"> กลับหน้ารายละเอียดบัญชี</a></p>
</div>


<?php }?>
<?php include_once('include/footer.php')?>