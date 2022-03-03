<?php include_once('include/navbar.php') ?>
<?php 
    include_once('config.inc.php');
    $result = mysqli_query($conn,"SELECT * FROM `promotion` ORDER BY pro_date asc");
?>
<style>
* {box-sizing: border-box;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.mySlides{
    max-width: 1024px;
    max-height: 300px;
}

/* The dots/bullets/indicators */


.active {
  background-color: #717171;
}

/* Fading animation */




</style>


<div class="slideshow-container">


<?php 
$counter = 0;
$max = 5;
while(($row = mysqli_fetch_array($result)) and ($counter < $max) ){
?>
<div class="mySlides">
  <img src="<?php echo $row['pro_img'] ?>" style="width:100%">
</div>

<span class="dot"></span> 
<?php $counter++; } ?>


</div>
<br>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>


<style>
    .news_infomation a{
        color: black;
    }
    
    .news_infomation a:hover{
        color: black;
        text-decoration: none;
    }
</style>
<div class="news mt-5">
<div class="container">

<div class="news_infomation">
    <h1 class="news_header text-center">โปรโมชั่น</h1>
    <div class="news_body">
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">รายการโปรโมชั่น</h6>
    <?php 
$result2 = mysqli_query($conn,"SELECT * FROM `promotion` ORDER BY pro_date asc");
while(($row2 = mysqli_fetch_array($result2))  ){
?>


    <a href="?page=promotion_view&&pro_id=<?php echo $row2['pro_id'] ?>">
        <div class="media text-muted pt-3">
          
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark h5"><?php echo $row2['pro_name'] ?> </strong>
            </div>
            <p class="d-block mt-2"> เวลา <?php echo $row2['pro_date'] ?></p>
          </div>
    </div>
    </a>

<?php } ?>

        <small class="d-block text-right mt-3">
          <!-- <a href="?page=ข่าว">ข่าวประชาสัมพันธ์ทั้งหมด</a> -->
        </small>
      </div>
    </div>
</div>
    
</div>
</div>