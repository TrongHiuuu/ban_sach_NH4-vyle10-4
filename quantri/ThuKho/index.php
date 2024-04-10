<?php
//not include controller
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/supplier.php';
require '../model/discount.php';
require '../model/category.php';
require '../model/product.php';
require '../model/phieunhapkho.php';
session_start();

$aside = '../inc/aside_thukho.php';
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'supplier':
            $result = getAllSupplier();
            $pageTitle = "supplier";
            require_once '../view/supplier.php';
            break;

        case 'searchSupplier':
            // $action = 'search';
            $pageTitle = "searchSupplier";
            if(isset($_POST['admin-controller-supplier'])){
                require_once '../controller/filterSupplier.php';
            }
            else $result = $_SESSION['searchResult'];
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

        case 'product':
            $result = getAllProduct();
            require_once '../view/product.php';
            break;

        case 'phieunhapkho':
            $result = getAllPhieuNhap();
            $pageTitle = "phieunhapkho";
            require_once '../view/phieunhapkho.php';
            break;

        case 'searchPhieunhapkho':
            // $action = 'search';
            $pageTitle = "searchPhieunhapkho";
            if(isset($_POST['admin-controller-phieunhapkho'])){
                require_once '../controller/filterPhieunhapkho.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/phieunhapkho.php';
            break; 

        case 'detail_phieunhapkho':
            if(isset($_GET['idPN'])){
                $phieunhap = getPhieuNhapByID($_GET['idPN']);
                $ctphieunhap = getDetailPhieuNhapByID($_GET['idPN']);
                require_once '../view/detail_phieunhapkho.php';
            }
            break;

        case 'add_phieunhapkho':
            if(isset($_GET['idNCC'])){
                $supplier = getSupplierByID($_GET['idNCC']);
                $ngaytao = date("Y-m-d");
                require_once '../view/add_phieunhapkho.php';   
            }
            break;

        case 'edit_phieunhapkho':
            if(isset($_GET['idPN'])){
                $phieunhap = getPhieuNhapByID($_GET['idPN']);
                $ctphieunhap = getDetailPhieuNhapByID($_GET['idPN']);
                require_once '../view/edit_phieunhapkho.php';
            }
            break;
            
        default:
        //require homepage
        $result = getAllSupplier();
        $pageTitle = "supplier";
        require_once '../view/supplier.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllSupplier();
    $pageTitle = "supplier";
    require_once '../view/supplier.php';
}
?>