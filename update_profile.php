<?php
session_start();
include 'settings.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $email = $_POST['email'];

    $sql = "UPDATE user SET email='$email' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Update failed: " . $conn->error;
    }
}
?>