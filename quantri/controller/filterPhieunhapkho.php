<?php
$sql = "select DISTINCT ncc.tenNCC, pn.idPN, tongtien, ngaytao, ngaycapnhat, pn.trangthai 
        from phieunhap as pn
        inner join ctphieunhap as ctpn on pn.idPN = ctpn.idPN
        inner join sach as s on ctpn.idSach = s.idSach
        inner join nhacungcap as ncc on s.idNCC = ncc.idNCC
        where 1";
if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) {
        $sql .= " and (pn.idPN LIKE '%".$kyw."%' or ncc.tenNCC LIKE '%".$kyw."%')";
    }
}
$sql.= " ORDER BY pn.idPN";

$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>