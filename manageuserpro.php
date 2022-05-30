<?php
//Add function
include_once("connectDB.php");
if (isset($_GET['function']) && $_GET['function'] == 'add') {
    $username = $_POST['username'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'") or die(mysqli_error($conn));
    if (mysqli_num_rows($res) >= 1) {
        echo "<script type='text/javascript'>alert('Username already exists');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
    $stid = $_POST['stid'];
    $checkstid = mysqli_query($conn, "SELECT * FROM users WHERE StudentID='$stid'") or die(mysqli_error($conn));
    if (mysqli_num_rows($checkstid) >= 1) {
        echo "<script type='text/javascript'>alert('StudentID already exists');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
    $email = $_POST['email'];
    $checkemail = mysqli_query($conn, "SELECT * FROM users WHERE StudentID='$email'") or die(mysqli_error($conn));
    if (mysqli_num_rows($checkemail) >= 1) {
        echo "<script type='text/javascript'>alert('Email already exists');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
    if (mysqli_num_rows($checkemail) >= 1) {
        echo "<script type='text/javascript'>alert('Email already exists');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
    $department = $_POST['department'];
    if ($department == 1) {
        echo "<script type='text/javascript'>alert('Invalid department');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    } else {
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $cart_id = $_POST['cart_id'];
        $userdate = date("Y/m/d");
        $password = md5('12345678');
        $result = mysqli_query($conn, "INSERT INTO `users`(`username`, `gender`, `email`, `card_uid`, `user_date`, `Password`, `StudentID`, `Department`,`add_card`) 
        VALUES ('$username','$gender','$email','$cart_id','$userdate','$password','$stid','$department',1)");
        echo "<script> location.href='admin.php'</script>";
        exit;
    }
}
//Update function
if (isset($_GET['function']) && $_GET['function'] == 'update') {
    $username = $_POST['username'];
    $id = $_POST['id'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($conn));
    if (mysqli_num_rows($res) >= 2) {
        echo "<script type='text/javascript'>alert('Username already exists');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
    $stid = $_POST['stid'];
    $checkstid = mysqli_query($conn, "SELECT * FROM users WHERE StudentID='$stid'") or die(mysqli_error($conn));
    if (mysqli_num_rows($checkstid) >= 2) {
        echo "<script type='text/javascript'>alert('StudentID already exists');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
    $email = $_POST['email'];
    $checkemail = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'") or die(mysqli_error($conn));
    if (mysqli_num_rows($checkemail) >= 2) {
        echo "<script type='text/javascript'>alert('Email already exists');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
    $department = $_POST['department'];
    if ($department == 1) {
        echo "<script type='text/javascript'>alert('Invalid department');</script>";
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    } else {
        $department = $_POST['department'];
        $gender = $_POST['gender'];
        $cart_id = $_POST['cart_id'];
        $id = $_POST['id'];
        mysqli_query($conn, "UPDATE `users` SET `username`='$username',`gender`='$gender',`email`='$email',`card_uid`='$cart_id',`StudentID`='$stid',`Department`='$department' WHERE id='$id'");
        echo "<script> location.href='admin.php?page=manageuser'</script>";
        exit;
    }
}
//remove function
if (isset($_GET['stid'])) {
    $stuid = $_GET['stid'];
    mysqli_query($conn, "DELETE FROM `users` WHERE StudentID='$stuid'");
    echo "<script> location.href='admin.php?page=manageuser'</script>";
    exit;
}
