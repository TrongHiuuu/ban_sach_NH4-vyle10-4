<?php
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/user.php';

/* add-data */
if(isset($_POST['add_data_user'])){
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $phanquyen = $_POST['phanquyen'];
    $matkhau = $_POST['matkhau'];
    if(!isExist($email, $dienthoai)){
        addUser($ten, $email, $dienthoai, $phanquyen, $matkhau);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_user'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_user'])){
    $id = $_POST['user_id'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $phanquyen = $_POST['phanquyen'];
    $trangthai = $_POST['trangthai'];
    editUser($id,$ten,$email,$dienthoai,$phanquyen,$trangthai);
    echo json_encode(array('success'=>true));
}
/* update-data */

/* view-data */
if(isset($_POST['view_data_user'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */

/* lock-data */
if(isset($_POST['lock_user'])){
    lockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* unlock-data */
if(isset($_POST['unlock_user'])){
    unlockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* unlock-data */
?>