<?php include_once('include/navbar.php')?>
<?php
$check_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : ''; 

?>
<?php if($check_admin == 'admin'){ ?>

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
</style>

<?php
include('config.inc.php');
if (isset($_POST['auth-reg'])) {
    $acc_name = $_POST['auth-name'];
    $acc_email = $_POST['auth-email'];
    $acc_pass  = $_POST['auth-pass'];
    $acc_phone  = $_POST['auth-phone'];

    $sql = "SELECT * FROM account Where acc_email='" . $acc_email . "' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        $query = "INSERT INTO account (acc_name,acc_email,acc_password,acc_address,acc_phone,acc_status) 
            VALUES ('$acc_name','$acc_email','$acc_pass','กรุณาเพิ่มที่อยู่','$acc_phone','member')";
        mysqli_query($conn, $query);
        echo '<script>location.href="?page=admin_member"</script>';
        // header('location: ?page=admin_member');

    } else { ?>
        <script>
            Swal.fire({
                title: 'ข้อมูลของคุณไม่ถูกต้อง',
                text:'เนื่องจากมีข้อมูลซ้ำ, โปรดลองอีกครั้ง',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: `ตกลง`,
            }).then((result) => {

                if (result.isConfirmed) {
                    header('location: ?page=member_insert');
           
                }
            })
        </script>
<?php }
}
?>

<?php include_once('include/navbar.php') ?>
<div class="container">
    

<a href="?page=admin_member" class="btn btn-primary btn-block btn-back">กลับหน้าสมาชิก</a><br>
<div class="login-form">
    <form action="" method="post">
        <div class="form-group">
        <label for="auth-name">ชื่อ - นามสกุล</label>
            <input type="text" class="form-control" placeholder="กรอกชื่อ - นามสกุล" id="auth-name" name="auth-name" required="required">
        </div>
        <div class="form-group">
        <label for="auth-phone">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" placeholder="กรอกเบอร์โทรศัพท์" id="auth-phone" name="auth-phone" required="required">
        </div>
        <div class="form-group">
        <label for="auth-email">อีเมล</label>
            <input type="email" class="form-control" placeholder="กรอกอีเมล" id="auth-email" name="auth-email" required="required">
        </div>
        <div class="form-group">
        <label for="auth-pass">รหัสผ่าน</label>
            <input type="password" class="form-control" placeholder="กรอกรหัสผ่าน" id="auth-pass" name="auth-pass" required="required">
        </div>
        <div class="form-group mt-5">
            <button type="submit" name="auth-reg" class="btn btn-primary btn-block">เพิ่มผู้ใช้งาน</button>
        </div>

    </form>
    
</div>
</div>
<?php }?>
<?php include_once('include/footer.php')?>
