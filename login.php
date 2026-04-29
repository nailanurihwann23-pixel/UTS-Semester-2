<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        header("Location: admin.php");
    } else {
        echo "<script>alert('Username atau Password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-4 mx-auto">
        <div class="card p-4 shadow">

            <h4 class="text-center mb-3">Login Admin</h4>

            <form method="POST">
                <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                <button type="submit" name="login" class="btn btn-primary w-100">
                    Login
                </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>