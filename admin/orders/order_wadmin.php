<?php
    include_once('config.inc.php');
    $result = mysqli_query($conn,"SELECT * FROM orders WHERE status='พนักงานกำลังตรวจสอบ' ");

    while($row = mysqli_fetch_array($result)){
        echo '    
        <a href="?page=orders&&OrderID='.$row["order_id"].'" class="text-dark" style="text-decoration:none">
            <div class="card mx-auto" style="">
            <div class="card-body">
                <h5 class="card-title">ออเดอร์ : '.$row["order_key"].' <p> โดย '.$row["order_name"].'</p> </h5>
                <h6 class="card-subtitle mb-2 text-muted">วันที่: '.$row["order_date"].'</h6>
                <p class="card-text">สถานะ: '.$row["status"].'</p>
            </div>
            </div>
        </a> ';

    }

    ?>