<?php
    include_once 'inc/header_productDetail.php';
    extract($result);
    $giaban = number_format($giaban,0,"",".");
?>
<section class="container-bottom">
    <div class="container-bottom-content1">
        <div class="container-bottom-content1-row1"> 
            <div class="container-bottom-content1-row1-left">
                <img src="uploads/uploads_product/<?=$hinhanh?>" alt="">
            </div>
            <div class="container-bottom-content1-row1-middle">
                <h1 class="container-bottom-content1-row1-items-text1">
                    <?=$tuasach?>
                </h1>
                <div class="container-bottom-content1-row1-items-price">
                    <div class="container-bottom-content1-row1-items-priceContent">
                        <div class="container-bottom-content1-row1-items-priceContent-row2">
                            <div class="list-price">
                                <span class="new-price"><?=$giaban?>đ</span>
                                <?php
                                    if($giaban != $giabia){
                                        $giabia = number_format($giabia,0,"",".");
                                        echo 
                                        '<span class="old-price">'.$giabia.'đ</span>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="container-bottom-content1-row1-items-priceContent-row3">
                            <div class="container-bottom-content1-row1-items-priceContent-row3-button">
                                <button onclick="cartNotification()">
                                    <i class="fa-solid fa-cart-plus"></i>
                                    <strong>Thêm Vào Giỏ Hàng</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-bottom-content1-row2">
            <div class="container-bottom-content1-row2-title">
                <b>GIỚI THIỆU SÁCH</b>
            </div>
            <div class="container-bottom-content1-row2-content">
                <div class="container-bottom-content1-row2-content-text1">
                    <b><?=$tuasach?></b>
                </div>
                <div class="container-bottom-content1-row2-content-text2">
                    <?=$mota?>
                </div>
                <div class="container-bottom-content1-row2-content-text3">
                    <b>Mời bạn đón đọc.</b>
                </div>
            </div>
            <div class="container-bottom-content1-row2-title">
                <b>THÔNG TIN CHI TIẾT</b>
            </div>
            <div class="container-bottom-content1-row2-content-detail">
                <ul class="container-bottom-content1-row2-content-detail-list">
                    <li>
                        <strong>Tác giả:</strong>
                        <span><?=$tacgia?></span>
                    </li>
                    <li>
                        <strong>Thể loại:</strong>
                        <span><?=$tenTL?></span>
                    </li>
                    <li>
                        <strong>Giá bìa:</strong>
                        <span><?=$giabia?></span>
                    </li>
                    
                </ul>
                <ul class="container-bottom-content1-row2-content-detail-list">
                    <li>
                        <strong>Nhà xuất bản:</strong>
                        <span><?=$nxb?></span>
                    </li>
                    <li>
                        <strong>Ngày phát hành:</strong>
                        <span><?=$namxb?></span>
                    </li>
                    <li>
                        <strong>Giá bán:</strong>
                        <span><?=$giaban?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
    include_once 'inc/footer.php';
?>
        