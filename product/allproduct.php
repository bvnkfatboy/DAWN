<style>

.column_pro {
  float: left;
  width: 20%;
  padding: 0 15px;

  padding-bottom:15px;
  /* border: 1px solid #444444; */
}

.row_pro {margin: 0; margin-top:15px;}


.row_pro:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 900px) {
  .column_pro {
    width: 50%;

  }
}

@media screen and (max-width: 600px) {
  .column_pro {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}


.product_cards {

  padding: 16px;
  text-align: center;


}

.product_cards p {
    
    font-size: 14px;
    word-wrap: break-word;
}


.product_cards img {
  display:block;
  width:100%;
  margin-left:auto;
  margin-right:auto;
}
.product_name{
    height: 25px;
    width: 100%;
}

.btn-editpro {        
        max-width: 150px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: bold;
        background-color: black;
        border: 1px black;
        margin-top:30px;
        margin-left:auto;
        margin-right:auto;
}


 .btn-editpro:hover{
    background-color: whitesmoke;
    color: black;

}

</style>


<div class="row_pro">

    <?php
        include_once('config.inc.php');
        include_once('include/navbar.php');
        $result = mysqli_query($conn,"SELECT * FROM product ORDER BY pro_name");

        while($row = mysqli_fetch_array($result)){
            echo '
            <a href="?page=product&&pro_id= '.$row['pro_id'].' " style="color:black">
              <div class="column_pro">
                <div class="product_cards">
                    <img  width="336px" src="'.$row['pro_image'].'">
                    <div class="product_name"><b class="product_text">'.$row['pro_name'].'</b> <p>'.$row['pro_price'].' บาท</p></div>

                </div>
              </div> 
            </a>
            
            ';

        }

    ?>

  <!-- <div class="column">
    <div class="product_cards">
        <img  width="336px" src="dist/img/product/1.jpg">
        <div class="product_name"><p class="product_text">Some text</p></div>
    </div>
  </div> -->

</div>
<?php include_once('include/footer.php');?>