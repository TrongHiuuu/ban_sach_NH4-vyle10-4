/* them anh */
let addPic = document.getElementById("add_pic");
let addFile = document.getElementById("add_file");

	addFile.onchange = function(){
		addPic.src = URL.createObjectURL(addFile.files[0]);
	}

let updatePic = document.getElementById("update_pic");
let updateFile = document.getElementById("update_file");

    updateFile.onchange = function(){
        updatePic.src = URL.createObjectURL(updateFile.files[0]);
    }
/* them anh */

/* function validate customer form */
function formValidate(ten, email, dienthoai) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }

    return alert;
}
/* function validate customer form */

/* function validate user form */
function formValidateUser(ten, email, dienthoai, phanquyen) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }    
    console.log(phanquyen);
    
    //Phan quyen
    if(phanquyen==-1){ // phanquyen===-1 sai, phanquyen==="-1" dung
        console.log("hello");
        alert = "<span class='red'>Vui lòng phân quyền cho người dùng.</span>";
        return alert;
    }
    return alert;
}
/* function validate user form */

/* function validate supplier form */
function formValidateSupplier(ten, email, dienthoai, diachi) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }

    //diachi
    if(diachi === ''){
        alert = "<span class='red'>Vui lòng nhập diachi.</span>";
        return alert;
    }
    
    return alert;
}
/* function validate supplier form */

/* function validate discount form */
function formValidateDiscount(phantram, ngaybatdau, ngayketthuc) {
    //Kiểm tra hợp lệ
    let alert = '';
    var curr_date = new Date();
    //phantram

    if(phantram <= 0 || isNaN(phantram)) {   //nếu tên rỗng
        alert = "<span class='red'>Phần trăm không hợp lệ</span>";
        return alert;
    }

    //thoi gian
    var start = new Date(ngaybatdau);
    start.setHours(0, 0, 0, 0);
    curr_date.setHours(0,0,0,0);    

    if(ngaybatdau == "" || ngayketthuc == ""){
        alert = "<span class='red'>Thời gian không hợp lệ!</span>";
        return alert;
    }

    if(start < curr_date){
        alert = "<span class='red'>Thời gian không hợp lệ!</span>";
        return alert;
    }

    if(ngaybatdau >= ngayketthuc){
        alert = "<span class='red'>Thời gian không hợp lệ!</span>";
        return alert;
    }

    return alert;
}
/* function validate discount form */

/* function validate product form */
function formValidateProduct(tuasach, nxb, idNCC, giabia, tacgia, namxb, idTL, mota) {
    // Kiểm tra hợp lệ
    let alert = '';

    // tuasach
    if(tuasach == "") {   
        alert = "<span class='red'>Vui lòng nhập tựa sách.</span>";
        return alert;
    }

    // nxb
    if(nxb == ""){
        alert = "<span class='red'>Vui lòng nhập nhà xuất bản.</span>";
        return alert;
    }

    // idNCC
    if(idNCC == -1){
        alert = "<span class='red'>Vui lòng chọn nhà cung cấp.</span>";
        return alert;
    }

    // giabia
    if(isNaN(giabia) || giabia <= 0){
        alert = "<span class='red'>Giá bìa không hợp lệ.</span>";
        return alert;
    }
    
    // tacgia
    if(tacgia == ""){
        alert = "<span class='red'>Vui lòng nhập tác giả.</span>";
        return alert;
    }

    // namxb
    if(isNaN(namxb) || namxb <=0 ){
        alert = "<span class='red'>Vui lòng nhập năm xuất bản.</span>";
        return alert;
    }

    // idTL
    if(idTL == -1){
        alert = "<span class='red'>Vui lòng chọn thể loại.</span>";
        return alert;
    }

    // mota
    if(mota == ""){
        alert = "<span class='red'>Vui lòng nhập mô tả.</span>";
        return alert;
    }

    return alert;
}
/* function validate product form */

/* function validate inventory form */
function formValidateInventory(sanpham, soluong, gianhap) {
   // Kiểm tra hợp lệ
    for(var i = 0; i<sanpham.length; i++)
        if(sanpham[i].value == "-1"){
            alert("Vui lòng nhập sản phẩm.\nLỗi: dòng "+(i+1));
            return false;
        }

    for(var i = 0; i<soluong.length; i++)
        if(soluong[i].value <= 0){
            alert("Vui lòng nhập số lượng lớn hơn 0.\nLỗi: dòng "+(i+1));
            return false;
        }
        else if(soluong[i].value == ""){
            alert("Vui lòng nhập số lượng.\nLỗi: dòng "+(i+1));
            return false;
        }

    for(var i = 0; i<gianhap.length; i++)
        if(gianhap[i].value <= 0){
            alert("Vui lòng nhập giá nhập lớn hơn 0.\nLỗi: dòng "+(i+1));
            return false;
        }
        else if(gianhap[i].value == ""){
            alert("Vui lòng nhập giá nhập.\nLỗi: dòng "+(i+1));
            return false;
        }
    
    return true;
}
/* function validate inventory form */

/* function validate inventory form 2*/
function formValidateInventory2(soluong, gianhap) {
    // Kiểm tra hợp lệ 
     for(var i = 0; i<soluong.length; i++)
         if(soluong[i].value <= 0){
             alert("Vui lòng nhập số lượng lớn hơn 0.\nLỗi: dòng "+(i+1));
             return false;
         }
         else if(soluong[i].value == ""){
             alert("Vui lòng nhập số lượng.\nLỗi: dòng "+(i+1));
             return false;
         }
 
     for(var i = 0; i<gianhap.length; i++)
         if(gianhap[i].value <= 0){
             alert("Vui lòng nhập giá nhập lớn hơn 0.\nLỗi: dòng "+(i+1));
             return false;
         }
         else if(gianhap[i].value == ""){
             alert("Vui lòng nhập giá nhập.\nLỗi: dòng "+(i+1));
             return false;
         }
     
     return true;
 }
 /* function validate inventory form 2*/