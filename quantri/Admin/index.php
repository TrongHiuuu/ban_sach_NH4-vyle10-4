<?php
//not include controller
include '../../config/config.php';
include '../../lib/session.php';
include '../../lib/connect.php';
require '../model/user.php';

$aside = "";
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'home':
            $result = getAllUser();
            require_once '../view/user.php';
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
        case 'signOut':
            login_session_unset();
            header("Location:../index.php?page=home");
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