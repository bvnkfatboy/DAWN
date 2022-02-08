<style>
.login-form {
    width: 450px;
    margin: 50px auto;
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
.login-form h2 {
    margin: 0 0 15px;
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

.btn:hover{
    background-color: whitesmoke;
    color: black;

}
</style>




<?php
include('config.inc.php');
if (isset($_POST['auth-log'])) {
    $acc_email = $_POST['auth-email'];
    $acc_pass  = $_POST['auth-pass'];
    
    $sql="SELECT * FROM account Where acc_email='".$acc_email."' and acc_password='".$acc_pass."' ";
    $result = mysqli_query($conn,$sql);
    
    if( mysqli_num_rows($result)==1){
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION['auth-id'] = $row['acc_id'];
        $_SESSION['auth-status'] = $row['acc_status'];
        
        header('Location: ?page=home');

    } else { ?>
        <script>
            Swal.fire({
                title: 'ข้อมูลของคุณไม่ถูกต้อง',
                text:'เนื่องจากมีข้อมูลไม่ถูก, โปรดลองอีกครั้ง',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: `ตกลง`,
            }).then((result) => {

                if (result.isConfirmed) {
                    header('location: ?page:login');
                }
            })
        </script>
<?php }
}

?>
<?php include_once('include/navbar.php')?>

<div class="login-form">
    <form action="" method="post">  
        <div class="form-group">
        <label for="auth-email">อีเมล</label>
            <input type="email" class="form-control" placeholder="กรอกอีเมล" id="auth-email" name="auth-email" required="required">
        </div>
        <div class="form-group">
        <label for="auth-pass">รหัสผ่าน</label>
            <input type="password" class="form-control" placeholder="กรอกรหัสผ่าน" id="auth-pass" name="auth-pass" required="required">
        </div>
        <div class="form-group mt-5">
            <button type="submit" name="auth-log" class="btn btn-primary btn-block">ลงชื่อเข้าใช้</button>
        </div>
    
    </form>
    
</div>

<?php include_once('include/footer.php')?>