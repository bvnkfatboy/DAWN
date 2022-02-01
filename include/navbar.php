<style>
  .ul-acc-nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #fbc531;
  }

  .ul-acc-nav li {
    float: left;
  }
  .ul-acc-nav p {
    margin:0;
    padding: 0;
    margin-top: 14px;
  }
  .ul-acc-nav li a {
    display: block;
    color: #2f3640;
    text-align: center;
    padding: 10px 5px;
    text-decoration: none;
  }


</style>


<div class="acc-nav">

<ul class="ul-acc-nav">
  <div class="container">
    
  <li><a href="#"> <i class="fab fa-instagram"></i> dawn.coffee</a></li>
  
  <?php 
      session_start();
      if(isset($_SESSION['auth-id'])){
        include('config.inc.php');
        $sql = "SELECT * FROM account WHERE acc_id='".$_SESSION["auth-id"]."' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        extract($row);
  ?>
  <li style="float:right"><a href="?page=logout">ออกจากระบบ</a></li>
  <li style="float:right" ><a style="color: #2f3640;">|</a></li>
  <li style="float:right" ><a href="?page=profile">คุณ: <?=$acc_name?></a></li>
  <?php }else{ ?>
  <li style="float:right"><a href="?page=register">สมัครสมาชิก</a></li>
  <li style="float:right" ><a style="color: #2f3640;">|</a></li>
  <li style="float:right" ><a href="?page=login">เข้าสู่ระบบ</a></li>
  <li style="float:right" ><a style="color: #2f3640;"><i class="fas fa-user-alt"></i></a></li>
  <?php }?>

  
  </div>
</ul>

</div>

<style>
  .bg-c-light{
    background-color: white;
  }

  .navbar-nav a{
    color: black !important;
  }
  .navbar-nav a:hover{
    color: rgb(150, 150, 150) !important;
  }
</style>


<nav class="navbar navbar-expand-md navbar-light bg-c-light">
  <div class="container">
  <a class="navbar-brand" href="?page=home">
    <img src="dist/img/logo_dawn.png" alt="logo" width="50px">
  </a>

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="?page=home">หน้าแรก</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          รายการสินค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?page=allproduct">รายการสินค้าทั้งหมด</a>
          <a class="dropdown-item" href="?page=drink">เครื่องดื่ม</a>
          <a class="dropdown-item" href="?page=bean">เมล็ดกาแฟ</a>
          <a class="dropdown-item" href="?page=mug">แก้วกาแฟ</a>
          <a class="dropdown-item" href="?page=more">อื่น ๆ</a>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">เกี่ยวกับ</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
            <?php 
              if(isset($_SESSION['auth-id'])){
            ?>
        <li class="nav-item">

            <a class="nav-link" href="?page=cart"><i class="fas fa-shopping-cart"></i> ตะกร้าสินค้า</a>
            
        </li>
        <?php }?>
        <?php
        // $check_admin = ($_SESSION['auth-status']);
        $nav_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : '';  
        if($nav_admin == "admin"){
        echo' 
            <li class="nav-item ">
                <a class="nav-link" href="?page=admin">หลังร้าน</a>
            </li> 
            ';
        }
        ?>
    </ul>
  </div>
  </div>

</nav>


