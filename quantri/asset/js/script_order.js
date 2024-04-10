/* add-data form */
$(document).ready(function() {

    /* Start: edit form */
    $('.open_edit_form_order').click(function(e) {
        e.preventDefault();
        var order_id = $(this).closest('tr').find('.order_id').text();
        $.ajax({
            url: '../controller/order.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data_order': true,
                'order_id': order_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var ctdonhang = obj.order_details;
                console.log(ctdonhang);
                var flag = true;
                var result = 
                '<tr class="title">'+
                    '<th>ID</th>'+
                    '<th>Sản phẩm</th>'+
                    '<th>Tồn kho</th>'+
                    '<th>Số lượng</th>'+
                    '<th>Đơn giá</th>'+
                    '<th>Thành tiền</th>'+
                '</tr>';
                for(var i=0; i<ctdonhang.length; i++){
                    var thanhtien = (ctdonhang[i].thanhtien).toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    var gialucdat = (ctdonhang[i].gialucdat).toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                                // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 0 }
                    ).replace(/,/g, '.');
                    result+=
                    '<tr>'+
                    '<td class="product_id">'+ctdonhang[i].idSach+'</td>'+
                    '<td>'+ctdonhang[i].tuasach+'</td>';
                    if(ctdonhang[i].tonkho < ctdonhang[i].soluong){
                        result+='<td style="color: red; font-weight: bold;">'+ctdonhang[i].tonkho+'</td>'+
                        '<td style="color: red; font-weight: bold;">'+ctdonhang[i].soluong+'</td>';
                        flag = false;
                    }
                    else{
                        result+='<td>'+ctdonhang[i].tonkho+'</td>'+
                        '<td>'+ctdonhang[i].soluong+'</td>';
                    }
                    result+='<td>'+gialucdat+'</td>'+
                    '<td>'+thanhtien+'</td>'+
                '</tr>';
                }
                $(".ctdonhang").html(result);
                
                var donhang = obj.order_info;
                $('#edit-form-order input[name="order_id"]').val(donhang.idDH);
                var khachhang = donhang.tenTK+" - #"+donhang.idTK;
                $('#edit-form-order input[name="khachhang"]').val(khachhang);
                $('#edit-form-order input[name="dienthoai"]').val(donhang.dienthoai);
                $('#edit-form-order input[name="diachigiao"]').val(donhang.diachigiao);
                $('#edit-form-order input[name="ngaytao"]').val(donhang.ngaytao);
                $('#edit-form-order input[name="ngaycapnhat"]').val(donhang.ngaycapnhat);
                $('#edit-form-order input[name="tongsanpham"]').val(donhang.tongsanpham);
                $('#edit-form-order input[name="tongtien"]').val(donhang.tongtien);

                // cho duyet: huy, cap nhat
                // dang giao: cap nhat
                // da giao: ko co
                // huy : ko co
                if(donhang.trangthai == "dagiao"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("htat").text("Hoàn tất"));
                    $('#edit-form-order select[name="trangthai"]').prop("disabled",true);
                }
                else if(donhang.trangthai == "huykh"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huykh").text("Hủy bởi khách hàng"));
                    $('#edit-form-order select[name="trangthai"]').prop("disabled",true);
                }
                else if(donhang.trangthai == "huynv"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huynv").text("Hủy bởi người bán"));
                    $('#edit-form-order select[name="trangthai"]').prop("disabled",true);
                }
                else if(donhang.trangthai == "vc"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("vc").text("Đang vận chuyển"));
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("htat").text("Hoàn tất"));
                }
                else {
                    // neu ton kho khong du thi phai huy don hang hoac tiep tuc o trang thai cho de cap nhat them san pham vao ton kho
                    if(flag == true){
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("cho").text("Chờ duyệt"));
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("vc").text("Đang vận chuyển"));
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("htat").text("Hoàn tất"));
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huykh").text("Hủy bởi khách hàng"));
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huynv").text("Hủy bởi người bán"));
                    }
                    else{
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("cho").text("Chờ duyệt"));
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huynv").text("Hủy bởi người bán"));
                    }
                }

                $('#edit-form-order select[name="trangthai"]').val(donhang.trangthai);
                // // Display the edit form as a pop-up
                $('#edit-modal-order').show();
            },

        });
    });
    /* End: edit form */

        /* update data */
    $('#edit-form-order').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // Serialize form data
        var formData = new FormData( $('#edit-form-order')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/order.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
            },
        });
    });
    /* End: update form */

    /* Start: view form */
    $('.open_view_form_order').click(function(e) {
        e.preventDefault();
        var order_id = $(this).closest('tr').find('.order_id').text();
        $.ajax({
            url: '../controller/order.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data_order': true,
                'order_id': order_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var ctdonhang = obj.order_details;
                console.log(ctdonhang);
                var result = 
                '<tr class="title">'+
                    '<th>ID</th>'+
                    '<th>Sản phẩm</th>'+
                    '<th>Tồn kho</th>'+
                    '<th>Số lượng</th>'+
                    '<th>Đơn giá</th>'+
                    '<th>Thành tiền</th>'+
                '</tr>';
                for(var i=0; i<ctdonhang.length; i++){
                    var thanhtien = (ctdonhang[i].thanhtien).toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    var gialucdat = (ctdonhang[i].gialucdat).toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                                // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 0 }
                    ).replace(/,/g, '.');
                    result+=
                    '<tr>'+
                    '<td class="product_id">'+ctdonhang[i].idSach+'</td>'+
                    '<td>'+ctdonhang[i].tuasach+'</td>'+
                    '<td>'+ctdonhang[i].tonkho+'</td>'+
                    '<td>'+ctdonhang[i].soluong+'</td>'+
                    '<td>'+gialucdat+'đ</td>'+
                    '<td>'+thanhtien+'đ</td>'+
                '</tr>';
                }
                $(".ctdonhang").html(result);

                var donhang = obj.order_info;
                var khachhang = donhang.tenTK+" - #"+donhang.idTK;
                $('#view-form-order input[name="khachhang"]').val(khachhang);
                $('#view-form-order input[name="dienthoai"]').val(donhang.dienthoai);
                $('#view-form-order input[name="diachigiao"]').val(donhang.diachigiao);
                $('#view-form-order input[name="ngaytao"]').val(donhang.ngaytao);
                $('#view-form-order input[name="ngaycapnhat"]').val(donhang.ngaycapnhat);
                $('#view-form-order input[name="tongsanpham"]').val(donhang.tongsanpham);
                $('#view-form-order input[name="tongtien"]').val(donhang.tongtien);
                $('#view-form-order select[name="trangthai"]').val(donhang.trangthai);
                // // Display the edit form as a pop-up
                $('#view-modal-order').show();
            },

        });
    });
    /* End: view form */

    // Event listener for close button clicks
    $('.close-btn-order').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#edit-modal-order').hide();
        $('#view-modal-order').hide();
        $('#view-modal-product').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=order&index="+curr_page;
    });
});



