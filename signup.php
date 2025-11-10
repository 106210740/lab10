<?php
session_start();
include 'settings.php';

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Username check
    $check = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $error = "Username already exists!";
    } else {
        $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $username;
            header("Location: profile.php");
            exit();
        } else {
            $error = "Signup failed. Please try again. " . $conn->error;
        }
    }
}
?>

<h2>Sign Up</h2>
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit" name="signup">Sign Up</button>
</form>

<?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
<p>Already have an account? <a href="login.php">Login here</a></p>