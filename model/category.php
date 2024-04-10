<?php
function getAllCategory(){
    $sql='select * from theloai where 1';
    $sql.=' and trangthai = 1';
    return getAll($sql);
}

function getCategoryById($id){
    $sql='select * from theloai where 1';
    $sql.=' and trangthai = 1';
    $sql.=' and idTL = '.$id;
    return getOne($sql);
}
?>