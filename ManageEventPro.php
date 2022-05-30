<?php
include_once('ConnectDB.php');
//add  function
if (isset($_GET['func']) && $_GET['func'] == 'add') {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    mysqli_query($conn, "INSERT INTO `event`(`title`, `description`, `date`, `location`, `time`) VALUES ('$title','$description','$date','$location','$time')");
    echo "<script> location.href='admin.php?page=manageevent'</script>";
    exit;
}
//update function
if (isset($_POST['btn_update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    mysqli_query($conn, "UPDATE `event` SET `title`='$title',`description`='$description',`date`='$date',`location`='$location',`time`='$time' WHERE `id`='$id'") or die(mysqli_error($conn));
    echo "<script> location.href='admin.php?page=manageevent'</script>";
    exit;
}
//remove function
if (isset($_POST['btn_delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM `event` WHERE id='$id'");
    echo "<script> location.href='admin.php?page=manageevent'</script>";
    exit;
}
