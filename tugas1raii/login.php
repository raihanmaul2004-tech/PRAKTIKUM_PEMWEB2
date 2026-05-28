<?php
include 'koneksi.php';
$error = '';

if (!empty($_SESSION['username'])) {
    echo '<div class="alert alert-success">Anda sudah login sebagai ' . htmlspecialchars($_SESSION['username']) . '.</div>';
    echo '<a class="btn btn-outline-danger" href="logout.php">Logout</a>';
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        
        // Tentukan role berdasarkan konten password di database
        $pw_plain = $_POST['password'];
        if(strpos(strtolower($pw_plain), 'admin') !== false){
            $_SESSION['role'] = 'Admin';
        } elseif(strpos(strtolower($pw_plain), 'user') !== false){
            $_SESSION['role'] = 'User';
        } else {
            $_SESSION['role'] = 'Guest';
        }
        
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<h2>Form Login</h2>
<?php if (!empty($error)): ?>
  <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<form method="post" action="index.php?hal=login">
  <div class="mb-3">
    <label class="form-label">Username:</label>
    <input type="text" name="username" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Password:</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
