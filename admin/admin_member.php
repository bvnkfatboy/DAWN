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


    .btn-edit{
        max-width: 100px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        color:white;
        border: 1px black;
    }

    .btn-edit:hover{
        background-color: whitesmoke;
        color: black;

    }



</style>
<div class="container">

<a href="?page=admin" class="btn btn-primary btn-block btn-back">กลับหน้าหลังบ้าน</a><br>



<table class="table table-hover mx-auto"  style="max-width:1024px;">
<h1 class="text-center">ข้อมูลสมาชิก</h1>
<!-- <a href="?page=member_insert" class="btn btn-primary btn-block btn-proinsert">เพิ่มผู้ใช้งาน</a> -->
<br>
  <thead>
  
    <tr>
      <th scope="col">อีเมล</th>
      <th scope="col">ชื่อ</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
     <!-- <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td></td>
    </tr> -->

    <?php
    include_once('config.inc.php');
    $result = mysqli_query($conn,"SELECT * FROM account ORDER BY acc_id asc");

    while($row = mysqli_fetch_array($result)){
        ?>
       <tr class='my-auto'>
        <td style='width:400px'><?php echo $row['acc_email']; ?></td>
        <td style='width:300px'><?php echo $row['acc_name']; ?></td>
        <td style='width:100px'>
        <a href='?page=member_edit&&acc-id=<?php echo $row[0]; ?>' class='btn btn-warning btn-block btn-edit'>แก้ไข</a>
        </td>
        <td style='width:100px'>
        <a href='?page=member_remove&&acc-id=<?php echo $row[0]; ?>' onClick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?')"  class='btn btn-warning btn-block btn-edit'>ลบ</a>
        </td>
      </tr>
        

        
       <?php 

    }

    ?>


  </tbody>
</table>
  
</div>
<?php include_once('include/footer.php');?>
<?php }else {
    header('Location: ?page=home');
}?>

