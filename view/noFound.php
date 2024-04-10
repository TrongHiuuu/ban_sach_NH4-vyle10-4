<?php
    include_once 'inc/header_search.php';
?>
    <section class="container-bottom">
        <div class="container-bottom-left">
        <?php
            include_once 'inc/filter.php';
        ?>
        </div>
        <div class="container-bottom-right">
            <div class="container-bottom-right-content">
                <div class="container-bottom-right-content-top">
                    Kết quả tìm kiếm: 
                    <input type="hidden" name="thingToSearchInput" value="<?=$thingToSearch?>" form="filter-form">
                    <input type="hidden" name="thingToSearchValInput" value="<?=$thingToSearchVal?>" form="filter-form">
                    <input type="hidden" name="title" value="<?=$title?>" form="filter-form">
                    <span id="searchResult" name=""><?=$title?></span>
                </div>
                <div class="container-bottom-right-content-bottom">
                <i class="fa-solid fa-magnifying-glass"></i>  Không tìm thấy dữ liệu.
                </div>
            </div>
        </div>
    </section>
<?php
    include_once 'inc/footer.php';
?>