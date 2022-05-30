<?php include_once('connectDB.php');
session_start();
if (isset($_GET['func']) && $_GET['func'] == 'update') {
    $username = $_POST['username'];
    $id = $_POST['id'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $us = $row['username'];
    }
    if ($us != $username) {
        $res1 = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error($conn));
        while ($row1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
            if ($username == $row1['username']) {
                echo "<script type='text/javascript'>alert('Username already exists');</script>";
                echo "<script> location.href='index.php?page=changeinfor'</script>";
                exit;
            }
        }
    }
    $stid = $_POST['stid'];
    $checkstid = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($conn));
    while ($row2 = mysqli_fetch_array($checkstid, MYSQLI_ASSOC)) {
        $stid1 = $row2['StudentID'];
    }
    if ($stid != $stid1) {
        $res2 = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error($conn));
        while ($row3 = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
            if ($stid == $row3['StudentID']) {
                echo "<script type='text/javascript'>alert('StudentID already exists');</script>";
                echo "<script> location.href='index.php?page=changeinfor'</script>";
                exit;
            }
        }
    }
    $email = $_POST['email'];
    $checkemail = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($conn));
    while ($row4 = mysqli_fetch_array($checkemail, MYSQLI_ASSOC)) {
        $email1 = $row4['email'];
    }
    if ($email != $email1) {
        $res3 = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error($conn));
        while ($row5 = mysqli_fetch_array($res3, MYSQLI_ASSOC)) {
            if ($email == $row5['email']) {
                echo "<script type='text/javascript'>alert('Email already exists');</script>";
                echo "<script> location.href='index.php?page=changeinfor'</script>";
                exit;
            }
        }
    }
    $department = $_POST['department'];
    if ($department == 1) {
        echo "<script type='text/javascript'>alert('Invalid department');</script>";
        echo "<script> location.href='index.php?page=changeinfor'</script>";
        exit;
    } else {
        $dob = $_POST['dob'];
        $github = $_POST['github'];
        $department = $_POST['department'];
        $gender = $_POST['gender'];
        $id = $_POST['id'];
        mysqli_query($conn, "UPDATE `users` SET `username`='$username',`gender`='$gender',`email`='$email',`StudentID`='$stid',`Department`='$department',`user_date`='$dob',`github`='$github' WHERE id='$id'");
        echo "<script type='text/javascript'>alert('Update successful');</script>";
        echo "<script> location.href='index.php?page=user'</script>";
        exit;
    }
}
