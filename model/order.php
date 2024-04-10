<?php
function getOneOrderByIdTK($idTK){
    $sql=
    'select donhang.trangthai as trangthaiDH, sach.trangthai as trangthaiSach, hinhanh, donhang.idDH as idDonHang, 
    tuasach, tacgia, soluong, gialucdat, tongtien 
    from donhang inner join CTdonhang on donhang.idDH = CTdonhang.idDH
    inner join sach on CTdonhang.idSach = sach.idSach where 1';
    $sql.=' and idTK = '.$idTK;
    $sql.=' and sach.trangthai != 0';
    return getOne($sql);
}

function getDetailOrderByIdDH($idDH){
    $sql = 'SELECT sach.trangthai AS trangthaiSach, hinhanh,';
    $sql .= ' sach.idSach AS idSH, tuasach, tacgia, soluong, gialucdat';
    $sql .= ' FROM ((SELECT * FROM donhang WHERE 1';
    $sql .= ' and idDH = '.$idDH;
    $sql .= ' ) AS `order`';
    $sql .= ' INNER JOIN CTdonhang ON `order`.idDH = CTdonhang.idDH';
    $sql .= ' INNER JOIN sach ON CTdonhang.idSach = sach.idSach)';
    return getAll($sql);
}

function getOrderByIdDH($idDH){
    $sql = 'SELECT * FROM donhang WHERE idDH = '.$idDH;
    return getOne($sql);
}

function orderCancelledByCustomer($idDH){
    $sql = 
        'UPDATE donhang 
        SET trangthai = 3
        WHERE idDH = '.$idDH;
        edit($sql);
}
?>