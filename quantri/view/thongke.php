<?php
    include '../model/func_lib.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In báo cáo thống kê</title>
</head>
<body>
    <div class="test">
        <a href="../controller/printInvoice.php">In đơn hàng</a>
        <br>
        <a href="../controller/printGRN.php">Phiếu nhập kho</a>
        <br>
        <p>In báo cáo doanh thu theo tháng</p>
            <form action="../controller/printReports.php" method="get">
                <input type="hidden" name="time" value="thang">
                <input type="hidden" name="report" value="doanhthu">
                <select name="thang" id="">
                    <option value="2024-01">Tháng 1/2024</option>
                    <option value="2024-02">Tháng 2/2024</option>
                    <option value="2024-03">Tháng 3/2024</option>
                    <option value="2024-04">Tháng 4/2024</option>
                </select>
                <button type="submit">In</button>
            </form>
        <br>
        <a">In báo cáo lợi nhuận theo tháng</a>
            <form action="../controller/printReports.php" method="get">
                <input type="hidden" name="time" value="thang">
                <input type="hidden" name="report" value="loinhuan">
                <select name="thang" id="">
                    <option value="2024-01">Tháng 1/2024</option>
                    <option value="2024-02">Tháng 2/2024</option>
                    <option value="2024-03">Tháng 3/2024</option>
                    <option value="2024-04">Tháng 4/2024</option>
                </select>
                <button type="submit">In</button>
            </form>
        <br>
        <p>In báo cáo nhập kho theo tháng</p>
            <form action="../controller/printReports.php" method="get">
                <input type="hidden" name="time" value="thang">
                <input type="hidden" name="report" value="nhapkho">
                <select name="thang" id="">
                    <option value="2024-01">Tháng 1/2024</option>
                    <option value="2024-02">Tháng 2/2024</option>
                    <option value="2024-03">Tháng 3/2024</option>
                    <option value="2024-04">Tháng 4/2024</option>
                </select>
                <button type="submit">In</button>
            </form>
        <br>
        <p>In báo cáo doanh thu theo năm</p>
            <form action="../controller/printReports.php" method="get">
                <input type="hidden" name="time" value="nam">
                <input type="hidden" name="report" value="doanhthu">
                <select name="nam" id="">
                    <script>
                        var year = new Date().getFullYear();
                        for(var i = 2022; i <= year; i++) {
                            document.write("<option value=" + i + ">Năm " + i + "</option>");
                        }
                    </script>
                </select>
                <button type="submit">In</button>
            </form>
        <br>
        <p>In báo cáo lợi nhuận theo năm</p>
            <form action="../controller/printReports.php" method="get">
                <input type="hidden" name="time" value="nam">
                <input type="hidden" name="report" value="loinhuan">
                <select name="nam" id="">
                    <script>
                        var year = new Date().getFullYear();
                        for(var i = 2022; i <= year; i++) {
                            document.write("<option value=" + i + ">Năm " + i + "</option>");
                        }
                    </script>
                </select>
                <button type="submit">In</button>
            </form>
        <br>
        <p>In báo cáo nhập kho theo năm</p>
            <form action="../controller/printReports.php" method="get">
                <input type="hidden" name="time" value="nam">
                <input type="hidden" name="report" value="nhapkho">
                <select name="nam" id="">
                    <script>
                        var year = new Date().getFullYear();
                        for(var i = 2022; i <= year; i++) {
                            document.write("<option value=" + i + ">Năm " + i + "</option>");
                        }
                    </script>
                </select>
                <button type="submit">In</button>
            </form>
        <?php
            // $idPN = 1;
            // $row = getGRNInfo($idPN);
            // extract($row);
            // echo var_dump($idPN);
        ?>
    </div>
</body>
</html>