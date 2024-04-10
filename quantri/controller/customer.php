<?php
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/customer.php';
require '../model/user.php';

/* add-data */
if(isset($_POST['add_data_customer'])){
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = $_POST['matkhau'];
    if(!isExist($email, $dienthoai)){
        addUser($ten, $email, $dienthoai, "KH", $matkhau);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_customer'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_customer'])){
    $id = $_POST['user_id'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $trangthai = $_POST['trangthai'];
    editUser($id,$ten,$email,$dienthoai,"KH",$trangthai);
    echo json_encode(array('success'=>true));
}
/* update-data */

/* view-data */
if(isset($_POST['view_data_customer'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */

/* lock-data */
if(isset($_POST['lock_customer'])){
    lockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* lock-data */
if(isset($_POST['unlock_customer'])){
    unlockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */
?>