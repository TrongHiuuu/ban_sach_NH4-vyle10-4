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
        case 'editInfo':
            $sql = "SELECT * FROM taikhoan where email='".$_SESSION['user']['email']."' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $user_info = mysqli_fetch_array($result);
            if(isset($_POST['submit_info'])) {
                $tenTK = $_POST['tenTK'];
                if (isset($tenTK) && !empty($tenTK)) {
                    $sql = "UPDATE taikhoan SET tenTK='".$tenTK."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                    $sql_run = mysqli_query($conn, $sql);
                    $notif = 'Thay đổi họ và tên thành công';
                    echo "<script>alert('{$notif}')</script>";
                    login_session_set_name($tenTK);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
        
                $email = $_POST['email'];
                if (isset($email) && !empty($email)) {
                    $sql = "UPDATE taikhoan SET email='".$email."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                    $sql_run = mysqli_query($conn, $sql);
                    $notif = 'Thay đổi email thành công';
                    echo "<script>alert('{$notif}')</script>";
                    login_session_set_email($email);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
        
                $phone = $_POST['phone'];
                if (isset($phone) && !empty($phone)) {
                    $sql = "UPDATE taikhoan SET dienthoai='".$phone."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                    $sql_run = mysqli_query($conn, $sql);
                    $notif = 'Thay đổi số điện thoại thành công';
                    echo "<script>alert('{$notif}')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
            if(isset($_POST['submit_password'])) {
                $c_password = $_POST['c_password'];
                $n_password = $_POST['n_password'];
                $r_n_password = $_POST['r_n_password'];
                
                if(password_verify($c_password, $user_info['matkhau'])) {
                    if (($n_password === $r_n_password) && !empty($n_password) && !empty($n_password)) {
                        $password_hash = password_hash($n_password, PASSWORD_DEFAULT);
                        $sql = "UPDATE taikhoan SET matkhau='".$password_hash."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                        $sql_run = mysqli_query($conn, $sql);
                        if($sql_run) {
                            $notif = 'Thay đổi mật khẩu thành công';
                            echo "<script>alert('{$notif}')</script>";
                        }
                        else {
                            $notif = 'Đã có lỗi xảy ra';
                            echo "<script>alert('{$notif}')</script>";
                        }
                    }
                    else {
                        $notif = 'Mật khẩu mới không trùng khớp với nhau';
                        echo "<script>alert('{$notif}')</script>";
                    }
                }
                else {
                    $notif = 'Mật khẩu hiện tại không đúng';
                    echo "<script>alert('{$notif}')</script>";
                }
            }
            require_once '../view/edit_info.php';
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