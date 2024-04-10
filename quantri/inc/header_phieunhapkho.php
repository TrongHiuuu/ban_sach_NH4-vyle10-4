<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/style_formPopup.css">
    <link rel="stylesheet" href="../asset/css/phieunhapkho.css">
    <script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <header>
        <img src="../../asset/img/logo.png" alt="" class="logo">
        <ul>
        <li><a href="?page=editInfo" class="account"><span><?php echo $_SESSION['user']['name']; ?></span></a></li>
            <li>| <a href="?page=signOut">Đăng xuất</a></li>
        </ul>
    </header>
    <div class="container">
    <?php
    if($aside!="") include "$aside";
    ?>