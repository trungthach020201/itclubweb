<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'userlog') { ?>
            <link rel="stylesheet" href="./css/User/LogIn.css">
            <link rel="stylesheet" href="./css/User/userlog.css">
        <?php } else { ?>
            <link rel="stylesheet" href="./css/User/user.css">
            <link rel="stylesheet" href="./css/User/LogIn.css">
            <link rel="stylesheet" href="./css/User/index.css">
            <link rel="stylesheet" href="./css/User/ManageUser.css">
            <link rel="stylesheet" href="./css/User/ManageDevice.css">
        <?php } ?>
    <?php } else { ?>
        <link rel="stylesheet" href="./css/User/user.css">
        <link rel="stylesheet" href="./css/User/LogIn.css">
        <link rel="stylesheet" href="./css/User/index.css">
        <link rel="stylesheet" href="./css/User/ManageUser.css">
        <link rel="stylesheet" href="./css/User/ManageDevice.css">
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./image/download.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./js/response.js"></script>
    <title>Manage User</title>
</head>

<body>

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

    <!-- menu -->
    <ul class="menu-bar">
        <div class="outline-mode"><p class="menu-mode">≡</p></div>
        <div class="menu-control">
            <li class="menu-item">
                <a href="admin.php" class="menu-name">Home</a>
            </li>
            <li class="menu-item">
                <a href="?page=manageuser" class="menu-name">Manage User</a>
            </li>
            <li class="menu-item">
                <a href="?page=managedevice" class="menu-name">Manage Devices</a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-name">Manage Events</a>
            </li>
            <li class="menu-item">
                <a href="?page=userlog" class="menu-name">User log</a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-name">Change Pass</a>
            </li>
            <li class="menu-item">
                <a href="admin.php?page=logout" class="menu-name">Log-out</a>
            </li>
        </div>
    </ul>

    <!-- body -->
    <div> </div>
    <?php
    session_start();
    if (!isset($_SESSION["Admin"])) {
        header("location: index.php?page=login");
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
        if ($page == 'manageuser_update') {
            include_once("manageuser_update.php");
        }
        if ($page == 'manageuserpro') {
            include_once("manageuserpro.php");
        }
        if ($page == 'managedevice') {
            include_once("ManageDevice.php");
        }
        if ($page == 'changepass') {
            include_once("Changepass.html");
        }
        if ($page == 'userlog') {
            include_once("UserLog.php");
        }
    } else {
        include("userlist.php");
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