<?php include_once('include/navbar.php') ?>

<style>
body, html {
  height: 100%;
  margin: 0;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3 {
  position: relative;
  opacity: 1;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("dist/img/background.jpg");
  height: 100%;
  box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.7);
}

.caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
}

.caption span.border {

  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
  border-color: none;
  border: 0px solid none;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 20px "Kanit", sans-serif;
  color: #111;
}
</style>

<div class="bgimg-1">
  <div class="caption">
    <span class="border">เริ่มวันดีๆ</span><br><br><br>
    <span class="border">ที่ DAWN (Cafe & Bar)</span>
  </div>
</div>

