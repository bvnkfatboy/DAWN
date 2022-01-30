<?php

include_once('include/navbar.php');
include_once('config.inc.php');
$removeid = $_GET['acc-id']; 
$check_admin = isset($_SESSION['auth-status']) ? $_SESSION['auth-status'] : ''; 


if($check_admin == 'admin' ){

    if($removeid != ''){


        $sql = mysqli_query($conn,"DELETE FROM account WHERE acc_id = '".$removeid."' ");

        if($sql){
            header('Location: ?page=admin_member');

        }

    }

}else {
    header('Location: ?page=home');
}?>

