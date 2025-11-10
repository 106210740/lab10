<?php
session_start();
include 'settings.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<h2>Profile Page</h2>
<p>Username: <?php echo $user['username']; ?></p>
<p>Email: <?php echo $user['email']; ?></p>

<h3>Edit Profile</h3>
<form method="post" action="update_profile.php">
    New Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
    <button type="submit" name="update">Update</button>
</form>

<br>
<a href="logout.php">Logout</a>
