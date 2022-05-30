<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Club</title>
    <link rel="stylesheet" type="text/css" href="./css/User/LogIn.css">
    <link rel="stylesheet" type="text/css" href="./css/User/changepass.css">
    <link rel="stylesheet" type="text/css" href="./css/User/index.css">
    <link rel="stylesheet" type="text/css" href="./css/User/ManageUser.css">
    <link rel="stylesheet" type="text/css" href="./css/User/userlog.css">
    <link rel="stylesheet" type="text/css" href="./css/User/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="shortcut icon" href="./image/download.jpg">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/response.js"></script>
</head>

<body style="background-color:  #0c5774;">
    <div id="header">
        <!-- logo left -->
        <div class="head-left">
            <img src="./image/lg-school.png" alt="logo-school" class="img-lg">
        </div>
        <div class="head-name">
            <img src="./image/lg-cl.png" alt="" class="img-club">
        </div>
        <div class="head-right">
            <img src="./image/lg-club.png" alt="logo-club" class="img-lg-club">
        </div>
    </div>

    <?php if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page != 'login') { ?>
            <!-- menu -->
            <ul class="menu-bar">
                <div class="outline-mode">
                    <p class="menu-mode">≡</p>
                </div>
                <div class="menu-control">
                    <li class="menu-item">
                        <a href="index.php?page=user" class="menu-name">Home</a>
                    </li>
                    <li class="menu-item">
                        <a href="index.php?page=changeinfor" class="menu-name">Change Information</a>
                    </li>
                    <li class="menu-item">
                        <a href="index.php?page=changepass" class="menu-name">Change-Pass</a>
                    </li>
                    <li class="menu-item">
                        <a href="index.php?page=logout" class="menu-name">Log-out</a>
                    </li>
                </div>
            </ul>
    <?php }
    } ?>

    <!-- body -->
    <?php
    session_start();
    if (!isset($_SESSION["us"]) && isset($_GET['page'])) {
        echo "<script> location.href='index.php'</script>";
        exit;
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'user') {
            include_once("user.php");
        }
        if ($page == 'logout') {
            include_once("logout.php");
        }
        if ($page == 'manageuser') {
            include_once("manageuser.php");
        }
        if ($page == 'login') {
            include_once("login.html");
        }
        if ($page == 'changepass') {
            include_once("Changepass.html");
        }
        if ($page == 'changeinfor') {
            include_once("ChangeInfor.php");
        }
    } else {
        include("login.html");
    }
    ?>


    <!-- footer -->
    <div id="footer">
        <div class="contact-infor">
            <div class="about">
                <h2 class="about-header"> Can Tho campus</h2>
                <hr style="margin-bottom: 20px;">
                <p class="ft-content">UNIVERSITY OF GREENWICH (VIET NAM)</p>
                <p class="ft-content">160 30/4 street, An Phu ward, Ninh Kieu District - Cantho City</p>
                <p class="ft-content">Tel: 0292.3512.369</p>
                <p class="ft-content">Hotline: 0968.670.804 | 0936.600.861</p>
            </div>
            <div class="icon">
                <i class="fa fa-solid fa-envelope" style="display: flex;">
                    <span class="text1" style="margin-left: 5px;">
                        <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=itclubofgwu@gmail.com&tf=1" class="ft-infor-linker">itclubofgwu@gmail.com</a>
                    </span>
                </i>
                <i class="gm fa-brands fa-facebook" style="display: flex; padding-right: 5px;">
                    <span class="text1" style="margin-left: 5px;">
                        <a href="https://www.facebook.com/Greewich.ITClub.CanTho" class="ft-infor-linker">fb.com/Greewich.ITClub.CanTho</a>
                    </span>
                </i>
            </div>
        </div>
        <div class="tag">
            <p>© Greenwich University | 2022 IT Club copyright</p>
        </div>
    </div>
    <script src="./assets/js/index.js"></script>

</body>

</html>