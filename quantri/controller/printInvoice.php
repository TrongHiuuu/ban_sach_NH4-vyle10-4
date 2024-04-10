<?php
    require '../model/func_lib.php';
    require '../tfpdf/tfpdf.php';

    //Chỉnh sửa: Lấy id của đơn hàng được click!!!
    if(isset($_GET['idDH'])) {
        $idDH = $_GET['idDH'];

        //Lấy thông tin đơn hàng
        $orderInfo = getOrderInfo($idDH);
        $orderId = $orderInfo['idDH'];
        $orderDate = dateFormat($orderInfo['ngaytao']);
        $CustomerId = $orderInfo['idTK'];
        $CustomerName = $orderInfo['tenTK'];
        $CustomerPhone = $orderInfo['dienthoai'];
        $orderTotal = $orderInfo['tongtien'];
    
        $pdf = new tFPDF("L", "mm", "A4");
        // $pdf->SetMargins(12.7, 12.7, 12.7);
        $pdf->AddPage();
    
        //Thêm font
        $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $pdf->AddFont('DejaVu', 'B', 'DejaVuSansCondensed-Bold.ttf', true);
        $pdf->AddFont('DejaVu', 'I', 'DejaVuSerifCondensed-Italic.ttf', true);
        $pdf->SetTextColor(0, 0, 0);
        
        $fill = 0;  //cell background must be painted (true) or transparent (false)
    
        
        //Chèn dữ liệu
        //Mỗi cụm Cell = 1 dòng
        $pdf->SetFont('DejaVu', 'B', 20);
    
        $pdf->Cell(95, 10, '', 0, 0);
        $pdf->Cell(96, 0, "HÓA ĐƠN BÁN HÀNG", 0, 0, 'C');
        $pdf->Cell(95, 10, '', 0, 1);
        
        $pdf->SetFont('DejaVu', 'B', 13);
    
        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(140, 5, "Thông tin đơn hàng", 0, 0);
        $pdf->Cell(117, 5, "Thông tin khách hàng", 0, 1);
    
        $pdf->SetFont('DejaVu', '', 13);
    
        $pdf->Cell(20, 10, '', 0, 0);
        $pdf->Cell(140, 10, "Mã đơn hàng: $orderId", 0, 0);
        $pdf->Cell(117, 10, "Mã khách hàng: $CustomerId",0 ,1);
    
        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(140, 5, "Ngày tạo đơn: $orderDate", 0, 0);
        $pdf->Cell(117, 5, "Tên khách hàng: $CustomerName",0 ,1);
    
        $pdf->Cell(160, 5, '', 0, 0);
        $pdf->Cell(117, 10, "Điện thoại: $CustomerPhone",0 ,1);
    
        $pdf->SetFont('DejaVu', 'B', 13);
        $pdf->Cell(0, 10, "Chi tiết đơn hàng: ", 0, 1);
        
        // $pdf->Ln(5);   //new line with line height = 5
    
            //Heading of the table
        $pdf->SetFont('DejaVu', 'B', 13);
        $pdf->SetFillColor(229, 212, 255);
    
        $pdf->Cell(30, 10, "Mã sách", 1, 0, 'C', true);
        $pdf->Cell(110, 10, "Tựa sách", 1, 0, 'C', true);
        $pdf->Cell(30, 10, "Số lượng", 1, 0, 'C', true);
        $pdf->Cell(50, 10, "Đơn giá", 1, 0, 'C', true);
        $pdf->Cell(50, 10, "Thành tiền", 1, 1, 'C', true);
    
            //Table datas
        $pdf->SetFont('DejaVu', '', 13);
    
        $totalQty = 0;
        foreach (getOrderDetailInfo($idDH) as $row) {
            $bookId = $row['idSach'];
            $bookTitle = $row['tuasach'];
            $quantity = $row['soluong'];
            $unitPrice = $row['gialucdat'];
            $uP_fm = number_format($row['gialucdat'], 0, ',', '.');
            $price = (int)$quantity * (int)$unitPrice;
            $price_fm = number_format($price, 0, ',', '.');
            $totalQty += $quantity;
    
            //Add datas of 1 row into table
            $pdf->Cell(30, 10, "$bookId", 1, 0, 'C');
            $pdf->Cell(110, 10, "$bookTitle", 1, 0, 'C');
            $pdf->Cell(30, 10, "$quantity", 1, 0, 'C');
            $pdf->Cell(50, 10, "$uP_fm VNĐ", 1, 0, 'C');
            $pdf->Cell(50, 10, "$price_fm VNĐ", 1, 1, 'C');
        }
            //End: Table datas
        
        $pdf->Ln(20);
    
            //Summary
        $totalStr = numberToWords($orderTotal);
        $pdf->SetFont('DejaVu', '', 16);
        $pdf->Cell(0, 10, "Tổng số lượng: $totalQty (cuốn)", 0, 1);
    
        $pdf->SetFont('DejaVu', 'B', 16);
        // $pdf->SetTextColor(255, 0, 0);
        $pdf->Cell(90, 10, "Tổng tiền: ".priceFormat($orderTotal)." đồng", 0, 0);
    
        $pdf->SetFont('DejaVu', 'I', 16);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, "($totalStr đồng)", 0, 1);
    
        $pdf->Ln(10);
        
            //Signs
        $pdf->SetFont('DejaVu', 'B', 13);
        
        $pdf->Cell(100, 5, "Người bán", 0, 0, 'C');
        $pdf->Cell(43, 5, "", 0, 0, 'C');
        $pdf->Cell(134, 5, "Người mua", 0, 1, 'C');
    
        $pdf->SetFont('DejaVu', 'I', 13);
    
        $pdf->Cell(100, 5, "(Ký tên, ghi rõ họ tên)", 0, 0, 'C');
        $pdf->Cell(43, 5, "", 0, 0, 'C');
        $pdf->Cell(134, 5, "(Ký tên, ghi rõ họ tên)", 0, 1, 'C');
    
        $pdf->Output("I", "Invoice_ID-$idDH.pdf");
    }
    else {
        echo "Không tìm thấy đơn hàng cần in!";
    }
?>