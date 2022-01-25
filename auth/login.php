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
include('config.php');
if (isset($_POST['auth-log'])) {
    $acc_email = $_POST['auth-email'];
    $acc_pass  = $_POST['auth-pass'];
    
    $sql="SELECT * FROM account Where acc_email='".$acc_email."' and acc_password='".$acc_pass."' ";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
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


<div class="login-form">
    <form action="" method="post">  
        <div class="form-group">
        <label for="auth-email">อีเมล</label>
            <input type="email" class="form-control" placeholder="Email" id="auth-email" name="auth-email" required="required">
        </div>
        <div class="form-group">
        <label for="auth-pass">รหัสผ่าน</label>
            <input type="password" class="form-control" placeholder="Password" id="auth-pass" name="auth-pass" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="auth-log" class="btn btn-primary btn-block">SIGN IN</button>
        </div>
    
    </form>
    <p class="text-center"><a href="?page=register">หากยังไม่มีบัญชี กดที่นี้</a></p>
    <p class="text-center"><a href="?page=home">กลับหน้าแรก</a></p>
</div>

