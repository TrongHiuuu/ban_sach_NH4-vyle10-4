<div class="container-bottom-left-filter">
    <div class="container-bottom-left-filter-category">
        <div style="font-size: 16px" class="container-bottom-left-filter-category-content1">
            <b>TÌM SÁCH THEO DANH MỤC SÁCH</b>
        </div>
        <div class="container-bottom-left-filter-category-content">
            <a href="?page=bestseller">Sách Bán Chạy</a>
        </div>
        <?php
            foreach($category as $item){
                extract($item);
        ?>
        <div class="container-bottom-left-filter-category-content">
            <a href="?page=category&idTL=<?=$idTL?>"><?=$tenTL?></a>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="container-bottom-left-filter-price">
        <div style="font-size: 16px" class="container-bottom-left-filter-category-content1">
            <b>TÌM SÁCH THEO GIÁ TIỀN</b>
        </div>
        <form class="container-bottom-left-filter-price-range" action="?page=filter" method="post" id="filter-form">
            <i>Nhập vào khoảng giá cần tìm</i>
                <div class="container-bottom-left-filter-price-range-input">
                    <input type="text" name="minPrice" id="minPrice">
                    --
                    <input type="text" name="maxPrice" id="maxPrice">
                </div>
                <div id="alert"></div>
                <button type="submit" name="filter-btn" class="filter-btn" onclick="return checkFilterForm();">Tìm kiếm</button>
        </form>
    </div>
</div>                                                                                                                                                                                                                                                                                                                              