
<?php
session_start();
include_once("connectDB.php");
$name = $_SESSION['us'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$name'");

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $pass = $row['Password'];
}
if (isset($_GET['function']) && $_GET['function'] == 'changepass') {
    $oldPass = $_POST["oldpass"];
    $newPass = $_POST["newpassword"];
    $confirmPass = $_POST["confrimpassword"];

    if (md5($oldPass) != $pass) {
        echo "<script>alert('Old password is not correct')</script>";
        echo "<script> location.href='index.php?page=changepass'</script>";
        exit;
    } elseif ($newPass != $confirmPass) {
        echo "<script>alert('New password and confirm password do not match')</script>";
        echo "<script> location.href='index.php?page=changepass'</script>";
        exit;
    } else {
        $pwd = md5($confirmPass);
        mysqli_query($conn, "UPDATE users SET `Password` = '$pwd' WHERE username = '$name'");
        echo "<script>alert('Change password success')</script>";
        echo "<script> location.href='index.php?page=user'</script>";
        exit;
    }
}
?>