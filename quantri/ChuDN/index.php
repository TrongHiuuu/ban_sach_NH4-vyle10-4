<?php
//not include controller
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/user.php';
require '../model/supplier.php';
require '../model/discount.php';
require '../model/category.php';
require '../model/order.php';
require '../model/product.php';

$aside = "../inc/aside_chuDN.php";
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'user':
            $result = getAllUser();
            require_once '../view/user.php';
            break;

        case 'supplier':
            $result = getAllSupplier();
            require_once '../view/supplier.php';
            break;

        case 'discount':
            $result = getAllDiscount();
            require_once '../view/discount.php';
            break;

        case 'category':
            $result = getAllCategory();
            require_once '../view/category.php';
            break;

        case 'order':
            $result = getAllOrder();
            require_once '../view/order.php';
            break;

        case 'product':
            $result = getAllProduct();
            require_once '../view/product.php';
            break;

        default:
        //require homepage
        $result = getAllUser();
        require_once '../view/user.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllUser();
    require_once '../view/user.php';
}

    
?>