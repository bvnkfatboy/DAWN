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
    .btn-update {
        min-height: 38px;
        border-radius: 2px;
    }
    label {
        
    }
    .btn-update {
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
    }

    .btn-update:hover {
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

if (isset($_POST['auth-update'])) {

    $auth_id = $_POST['auth-id'];
    $auth_name = $_POST['auth-name'];
    $auth_email = $_POST['auth-email'];
    $auth_address = $_POST['auth-address'];
    $auth_phone = $_POST['auth-phone'];
    $auth_status = $_POST['auth-status'];

    $sql = "UPDATE account SET acc_name ='".$auth_name."',
                               acc_email ='".$auth_email."',
                               acc_address ='".$auth_address."',
                               acc_phone ='".$auth_phone."',
                               acc_status ='".$auth_status."'
                               WHERE acc_id ='".$auth_id."' ";
    $suc = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
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
                    location.href='?page=admin_member';

                }
            })
        </script>
    <?php }
}

?>


<?php
$sql = "SELECT * FROM account WHERE acc_id='".$_GET["acc-id"]."' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);

?>
<a href="?page=admin" class="btn btn-primary btn-block btn-back">กลับหน้าสมาชิก</a><br>
<div class="login-form">
    <form action="" method="post">

    <input type="hidden" class="form-control"  value="<?=$acc_id ?>" id="auth-id" name="auth-id" >
        <div class="form-group">
        <label for="auth-name">NAME</label>
            <input type="text" class="form-control" placeholder="Name" value="<?=$acc_name ?>" id="auth-name" name="auth-name" required="required">
        </div>
        <div class="form-group">
        <label for="auth-email">EMAIL</label>
            <input type="email" class="form-control" placeholder="Email" value="<?=$acc_email ?>" id="auth-email" name="auth-email" required="required">
        </div>
        <div class="form-group">
            <label for="auth-address">ADDRESS</label>
            <textarea class="form-control" id="auth-address" name="auth-address"  rows="3"><?=$acc_address ?></textarea>
        </div>
        <div class="form-group">
        <label for="auth-phone">PHONE</label>
            <input type="text" class="form-control" placeholder="Phone" value="<?=$acc_phone ?>" id="auth-phone" name="auth-phone" required="required">
        </div>
        <div class="form-group">
        <label for="auth-status">STATUS</label>
            <!-- <input type="text" class="form-control" placeholder="Phone" value="" id="auth-status" name="auth-status" required="required"> -->

            <select id="auth-status" name="auth-status" class="form-control">
            <option selected><?=$acc_status ?></option>
            <option>admin</option>
            <option>member</option>
        </select>
        </div>
        <div class="form-group">
            <button type="submit" name="auth-update" class="btn btn-primary btn-block btn-update">UPDATE</button>
        </div>

    </form>
</div>


<?php }?>
<?php include_once('include/footer.php')?>
