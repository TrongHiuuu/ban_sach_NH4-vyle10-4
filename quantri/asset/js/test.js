/* add-data form */
$(document).ready(function() {

    $('.create_phieunhap').click(function(){
        $('.inventory_detail').show();
    });

    // tim kiem san pham de nhap kho
    $('.open_search_product').click(function() {

        var search_input = $('input[type="text"][name="search_product_input"]').val();

        $.ajax({
            url: '../controller/phieunhapkho.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'search_product': true,
                'search_input': search_input,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var result = '<ul>';
                if(obj!=null){
                    for(var i=0; i<obj.length; i++){
                        result+=
                        '<li class="result-box-items">'+obj[i].idSach+'-'+obj[i].tuasach+'</li>';
                    }
                }
                else result+=
                '<li class="result-box-items"><span>Không tìm thấy</span></li>';
                result+="</ul>";
                $('.result-box').html(result);
                // Display the edit form as a pop-up
                $('.result-box').show();
            },
        });
    })
    
    // chon san pham them vao phieu nhap
    $('.result-box-items').click(function() {

        var input = $(this).html().split("-");

        $('input[type="text"][name="id_product"]').val(input[0]);
        $('input[type="text"][name="search_product_input"]').val(input[1]);
        
   });

    $('#add-form-phieunhapkho').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
            // Serialize form data
            var formData = new FormData( $('#add-form-phieunhapkho')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/phieunhapkho.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const tbodyEl = document.querySelector("tbody");
                    const tableEl = document.querySelector("table");
                    var newRow = document.querySelector('.add-new-line-a a');
                    var deleteRow = document.querySelector('.deleteBtn');
                    function onAddWebsite(e) {
                        e.preventDefault();
                        tbodyEl.innerHTML += `
                            <tr>
                                <td class="srch-product">
                                    <input type="text" name="srch_product" placeholder="Tìm kiếm tên hoặc mã sách...">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </td>
                                <td class="quantity">
                                    <input type="number" name="sl" >
                                </td>
                                <td class="gianhap">
                                    <input type="text" name="" id="">
                                </td>
                                <td>
                                    <div class="giabia">100.000d</div>
                                </td>
                                <td>
                                    <div class="thanhtien">100.000d</div>
                                </td>
                                <td>
                                    <button type="button" class="deleteBtn">
                                    <i class="fa-solid fa-x"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    }
                    
                    function onDeleteRow(e) {
                        if (!e.target.classList.contains("deleteBtn")) {
                            return;
                        }
                        const btn = e.target;
                        btn.closest("tr").remove(); 
                    }
                    
                    newRow.addEventListener("click", onAddWebsite);
                    tableEl.addEventListener("click", onDeleteRow);
                    
                    const searchInput = document.querySelector('.srch-product-box');
                    const resultBox = document.querySelector('.result-box');
                    
                    document.addEventListener('focus', function(event) {
                        if (event.target.matches('.srch-product-box')) {
                            // Hiển thị .result-box tương ứng
                            event.target.nextElementSibling.style.display = 'block';
                        }
                    }, true); //sử dụng true ở cuối để sử dụng sự kiện delegate
                    
                    document.addEventListener('blur', function(event) {
                        if (event.target.matches('.srch-product-box')) {
                            // Ẩn .result-box tương ứng
                            event.target.nextElementSibling.style.display = 'none';
                        }
                    }, true);            console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) $('.alert').html('<span class="green">Thêm thành công</span>');
                },
            });
    });
    /* End: add form */

    // Event listener for close button clicks
    $('.close-btn-phieunhapkho').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-phieunhapkho').hide();
        $('#update_file').val('');
        $('#edit-modal-phieunhapkho').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=phieunhapkho&index="+curr_page;
    });
});


$('.myDropdown a').onclick(function(){
    var item = $(this).html().split("-");
    $('.myDropdown input[name="idSach"]').val(item[0]);
    $('.myInput').val(item[1]);
    $.ajax({
        url: '../controller/product.php', // URL to handle form submission
        type: 'POST',
        data: {
            'product_info': true,
            'product_id': item[0],
        },
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            const obj = JSON.parse(response);

            // format gia tien
            var giabia = (obj.giabia).toLocaleString(
                undefined, // leave undefined to use the visitor's browser 
                           // locale or a string like 'en-US' to override it.
                { maximumFractionDigits: 2 }
              ).replace(/,/g, '.');
            var tr = $(this).closest('tr');
            tr.find('.giabia').text(giabia);
        },
    });
})


/* complete button*/
if(isset($_POST['complete-btn'])){
    updatePhieuNhapKho($_POST['idPN'], date("Y-m-d"),"ht");
    echo json_encode(array('success'=>true));
}
/* complete button*/