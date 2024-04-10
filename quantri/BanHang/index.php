<?php
//not include controller
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/customer.php';
require '../model/order.php';
session_start();

$aside = "../inc/aside_banhang.php";
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'customer':
            $result = getAllCustomer();
            $pageTitle = "customer";
            require_once '../view/customer.php';
            break;

        case 'searchCustomer':
            // $action = 'search';
            $pageTitle = "searchCustomer";
            if(isset($_POST['admin-controller-customer'])){
                require_once '../controller/filterCustomer.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/customer.php';
            break;   

        case 'order':
            $result = getAllOrder();
            $pageTitle = "order";
            require_once '../view/order.php';
            break;

        case 'searchOrder':
            // $action = 'search';
            $pageTitle = "searchOrder";
            if(isset($_POST['admin-controller-order'])){
                require_once '../controller/filterOrder.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/order.php';
            break;       
        
        default:
        //require homepage
        $result = getAllCustomer();
        $pageTitle = "customer";
        require_once '../view/customer.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllCustomer();
    $pageTitle = "customer";
    require_once '../view/customer.php';
}

    
?>