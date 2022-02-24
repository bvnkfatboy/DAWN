

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $output = '<title>%TITLE%</title>'; ?>

    <link rel="stylesheet" href="dist/css/reset.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="dist/css/font.css">
    <link rel="stylesheet" href="dist/css/fontawesome.css">
    <link rel="stylesheet" href="dist/css/sweetalert2.min.css">
    <link href="dist/img/icontitle.png" rel="icon" type="image/png" />
    <script src="dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/sweetalert2.all.min.js"></script>


    <style>
        /* body{
            width: 100%;
            max-width: 1324px;
                
        } */
    </style>
</head>


<body class="mx-auto">
    <?php 
    $current_page = isset($_GET['page']) ? $_GET['page'] : 'home' ;

    switch ($current_page) {


        case ('allproduct'):
            include_once 'product/allproduct.php';
            $title = "สินค้าทั้งหมด - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('delivery_uapply'):
            include_once 'delivery/delivery_yourapp.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('delivery_apply'):
            include_once 'delivery/delivery_apply.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('delivery_deapp'):
            include_once 'delivery/apply/delivery_deapp.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('delivery_app2'):
            include_once 'delivery/apply/delivery_app2.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('delivery_app'):
            include_once 'delivery/apply/delivery_app.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('showjob2'):
            include_once 'delivery/apply/delivery_showjob2.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('showjob'):
            include_once 'delivery/apply/delivery_showjob.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('delivery_order'):
            include_once 'delivery/delivery_order.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('delivery'):
            include_once 'delivery/delivery_home.php';
            $title = "พนักงานจัดส่ง - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('drink'):
            include_once 'product/drink.php';
            $title = "เครื่องดื่ม - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('bean'):
            include_once 'product/bean.php';
            $title = "เมล็ดกาแฟ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('mug'):
            include_once 'product/mug.php';
            $title = "แก้วกาแฟ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('more'):
            include_once 'product/more.php';
            $title = "อื่น ๆ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('home'):
            include_once 'homepage.php';
            $title = "DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        // auth process 
        case ('login'):
            include_once 'auth/login.php';
            $title = "Login - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('register'):
            include_once 'auth/register.php';
            $title = "Register - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('logout'):
            include_once 'auth/logout.php';
            $title = "Logout - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('profile'):
            include_once 'auth/profile.php';
            $title = "Profile - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('edit_profile'):
            include_once 'auth/editprofile.php';
            $title = "Profile - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        // admin page
        case ('admin'):
            include_once 'admin/admin_page.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('admin_member'):
            include_once 'admin/admin_member.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('admin_product'):
            include_once 'admin/admin_product.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('admin_approve'):
            include_once 'admin/admin_approve.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('admin_tracking'):
            include_once 'admin/admin_tracking.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('admin_data'):
            include_once 'admin/admin_data.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        // admin member
        case ('member_edit'):
            include_once 'admin/member/member_edit.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('member_remove'):
            include_once 'admin/member/member_remove.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        // admin product
        case ('product_edit'):
            include_once 'admin/product/product_edit.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('product_insert'):
            include_once 'admin/product/product_insert.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('product_remove'):
            include_once 'admin/product/product_remove.php';
            $title = "หลังร้าน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;


        // order systems
        case ('product'):
            include_once 'product/product.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('order_delete'):
            include_once 'product/order/delete.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('orders'):
            include_once 'product/orders.php';
            $title = "ออเดอร์ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('order'):
            include_once 'product/order/order.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('cart_clear'):
            include_once 'product/order/clear.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('cart'):
            include_once 'product/order/cart.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('checkout'):
            include_once 'product/order/checkout.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('checkout2'):
            include_once 'product/order/checkout2.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('checkout3'):
            include_once 'product/order/checkout3.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('save_checkout'):
            include_once 'product/order/save_checkout.php';
            $title = "ตะกร้าสินค้า - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        case ('payment'):
            include_once 'payment/payment.php';
            $title = "ชำระเงิน - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        case ('payments'):
            include_once 'admin/payments/payments.php';
            $title = "พนักงานตรวจสอบ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        case ('payments_app'):
            include_once 'admin/payments/payments_app.php';
            $title = "พนักงานตรวจสอบ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;
        case ('payments_del'):
            include_once 'admin/payments/payments_del.php';
            $title = "พนักงานตรวจสอบ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        case ('track_set'):
            include_once 'admin/tracking/tracking_set.php';
            $title = "แจ้งเลขพัสดุ - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        default:
            include_once 'error404.php';
            $title = "ERROR PAGE - DAWN (Cafe & Bar)";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
    }
    ?>



</body>

</html>