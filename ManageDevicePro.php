<?php
//Delele the device
include('connectDB.php');
if (isset($_GET['func']) && $_GET['func'] == 'delete') {
    $id = $_GET['deviceid'];
    mysqli_query($conn, "DELETE FROM devices WHERE id=$id");
    echo "<script> location.href='admin.php?page=managedevice'</script>";
    exit;
}
// Add new a device
if (isset($_GET['func']) && $_GET['func'] == 'add') {
    $dev_name = $_POST['devicename'];
    $dev_dep = $_POST['departmentname'];
    $token = random_bytes(8);
    $dev_token = bin2hex($token);

    $sql = "INSERT INTO devices (device_name, device_dep, device_uid, device_date) VALUES('$dev_name', '$dev_dep', '$dev_token', CURDATE())";
    mysqli_query($conn, $sql);
    echo "<script> location.href='admin.php?page=managedevice'</script>";
    exit;
    mysqli_stmt_close($result);
    mysqli_close($conn);
}
//Reload Function
if (isset($_GET['func']) && $_GET['func'] == 'reload') {
    $dev_id = $_GET['deviceid'];

    $token = random_bytes(8);
    $dev_token = bin2hex($token);

    $sql = "UPDATE devices SET device_uid=? WHERE id=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo '<p class="alert alert-danger">SQL Error</p>';
    } else {
        mysqli_stmt_bind_param($result, "si", $dev_token,  $dev_id);
        mysqli_stmt_execute($result);
        echo "<script> location.href='admin.php?page=managedevice'</script>";
        exit;
    }
    mysqli_stmt_close($result);
    mysqli_close($conn);
}
//Set dev_mode of device
if (isset($_GET['func']) && $_GET['func'] == 'updatemode') {
    if (isset($_POST['enroll']))
        $dev_mode = 0;
    else {
        $dev_mode = 1;
    }
    $dev_id = $_GET['deviceid'];

    $sql = "UPDATE devices SET device_mode=? WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo '<p class="alert alert-danger">SQL Error</p>';
    } else {
        mysqli_stmt_bind_param($stmt, "ii", $dev_mode, $dev_id);
        mysqli_stmt_execute($stmt);
        echo 1;
    }
    echo "<script> location.href='admin.php?page=managedevice'</script>";
    exit;
}
