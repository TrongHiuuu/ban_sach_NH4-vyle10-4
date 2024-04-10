<?php
    extract($category);
?>
<body>
        <div class="website">
            <!-- phần header có navbar -->
            <header class="header">
                <nav class="header-navbar">
                    <!-- các elements trên navbar -->
                    <ul class="header-navbar-list">
                        <li class="header-navbar-items">
                            <a href="?page=home"><img src="asset/img/vinabookLogo.png" alt="Vinabook-Logo"></a>
                        </li>
                        <li class="header-navbar-items">
                            <form action="?page=search" method="post" class="header-navbar-items-search" name="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="text" placeholder="Tìm kiếm tựa sách, tác giả" name="kyw">
                                <button type="submit" name="search" class="findBook-button">Tìm sách</button>
                            </form>
                        </li>
                        <li class="header-navbar-items">
                            <div class="header-navbar-items-Cart-SignIn-SignUp">
                                <div class="header-navbar-items-Cart">
                                    <a class="cart" href="#">
                                        <div class="circle"></div>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                                <div class="header-navbar-items-SignIn-SignUp">
                                    <a id="signin" href="#"><div class="header-navbar-items-SignIn">Đăng nhập</div></a>
                                    <div class="header-navbar-items-separate"></div>
                                    <a id="signup" href="#"><div class="header-navbar-items-SignUp">Đăng ký</div></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>
            <section class="container">
                <section class="container-top">
                    <div class="container-top-book-catalogue">
                        <div class="container-top-book-catalogue-content">
                            <div class="container-top-book-catalogue-content-left-dropdown">
                                <input type="checkbox" id="dropcheck" class="dropcheck">
                                <label for="dropcheck" class="dropbtn"><i class="fa-solid fa-bars"></i> Danh Mục Sách</label>
                                <div class="dropdown-content">
                                    <ul class="container-top-dropDownList-and-banner-left-list">
                                        <li class="container-top-dropDownList-and-banner-left-list-items">
                                            <div class="container-top-dropDownList-and-banner-left-list-items-text">
                                                <a href="?page=bestseller">Sách Bán Chạy</a>
                                            </div>
                                        </li>

                                        <?php
                                            foreach($category as $item){
                                                extract($item);
                                        ?>
                                        <li class="container-top-dropDownList-and-banner-left-list-items">
                                            <div class="container-top-dropDownList-and-banner-left-list-items-text">
                                                <a href="?page=category&idTL=<?=$idTL?>"><?=$tenTL?></a>
                                            </div>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="container-top-book-catalogue-content-right">
                                <i class="fa-solid fa-phone"></i>
                                <p>Hotline: 1900 704421</p>
                            </div>
                        </div>
                    </div>
                </section>