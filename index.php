<?php
include 'config/config.php';
include 'lib/connect.php';
require 'model/product.php';
require 'model/category.php';
require 'model/order.php';
require 'model/customer.php';

if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'home':
            $result = getLimitProductBestSeller(12);
            $category = getAllCategory();
            require_once 'view/home.php'; 
            break;

        case 'bestseller':
            $result = getAllProductBestSeller();
            $category = getAllCategory();
            $title = "Sách Bán Chạy";
            $thingToSearch = "category";
            $thingToSearchVal = -1;
            require_once 'view/search.php';
            break;

        case 'category':
            if(isset($_GET['idTL'])){
                $idTL = $_GET['idTL'];
                $category = getAllCategory();   
                // sach thuoc the loai can tim
                $result = getAllProductByCategory($idTL);
                // thong tin the loai can tim
                $categorySearch = getCategoryByID($idTL);
                $title = $categorySearch['tenTL'];
                $thingToSearch = "category";
                $thingToSearchVal = $idTL;
                if($result!=null) require_once 'view/search.php';
                else require_once 'view/noFound.php';
            }
            break;

        case 'search':
            if(isset($_POST['search'])){
                $kyw = $_POST['kyw'];
                if($kyw !== ""){
                $result = searchProduct($kyw);
                $category = getAllCategory();
                $title = $kyw;
                $thingToSearch = "basic";
                $thingToSearchVal = $kyw;
                if($result!=null) require_once 'view/search.php';
                else require_once 'view/noFound.php';
                }
                else header("Location: ?page=home");
            }
            break;

        case 'filter':
            if(isset($_POST['filter-btn'])){
                $minPrice = $_POST['minPrice'];
                $maxPrice = $_POST['maxPrice'];
                $thingToSearch = $_POST['thingToSearchInput'];
                $thingToSearchVal = $_POST['thingToSearchValInput'];
                $title = $_POST['title'];
                $result = null;
                $category = getAllCategory();

                // kyw - price
                if($thingToSearch == "basic")
                    $result = filterProductByKeyword($thingToSearchVal, $minPrice, $maxPrice);
                else if($thingToSearch == "category"){
                    
                    // bestseller - price
                    if($thingToSearchVal == -1)
                        $result = filterBestsellerProduct($minPrice, $maxPrice);

                    // category - price
                    else $result = filterCategoryProduct($thingToSearchVal, $minPrice, $maxPrice);
                }

                if($result!=null) require_once 'view/search.php';
                else require_once 'view/noFound.php';
            }
            break;
        
        case 'productDetail':
            if(isset($_GET['idSach'])){
                $result = getProductById($_GET['idSach']);
                $tenTL = "";
                if(isset($_GET['idTL'])){
                    $theloai = getCategoryById($_GET['idTL']);
                    $tenTL = $theloai['tenTL'];
                }
                $category = getAllCategory();   
                require_once 'view/productDetail.php';
            }
            break;

        case 'order':
            $idTK = 1;
            $result = getOneOrderByIdTK($idTK);
            $category = getAllCategory();   
            require_once 'view/order.php';
            break;

        case 'orderDetail':
            if(isset($_GET['idDH'])){
                $idDH = $_GET['idDH'];
                $idTK = 1;
                $customer = getOneCustomerById($idTK);
                $detail = getDetailOrderByIdDH($idDH);
                $order = getOrderByIdDH($idDH);
                $category = getAllCategory();   
                require_once 'view/orderDetail.php';
            }
            break;

        case 'cancelOrder':
            if(isset($_GET['idDH']) && isset($_POST['cancel'])){
                $idDH = $_GET['idDH'];
                orderCancelledByCustomer($idDH);
                $category = getAllCategory();
                require_once 'view/orderCancel.php';
            }
            break;

        
        default:
        $result = getLimitProductBestSeller(12);
        $category = getAllCategory();
        require_once 'view/home.php';
        break;
    }
}
else{
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory();
    require_once 'view/home.php';
}

?>