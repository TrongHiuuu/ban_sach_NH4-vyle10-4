<?php
    function getOneCustomerById($idTK){
        $sql='SELECT * FROM taikhoan WHERE 1';
        $sql.=' and idTK = '.$idTK;
        return getOne($sql);
    }
?>