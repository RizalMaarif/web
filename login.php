<?php

include 'koneksi.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Form Login</title>
    <link rel="stylesheet" href="./stylelogin.css">
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Form Login</div>
            <div class="title signup">Form Registrasi</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Daftar</label>
                <div class="slider-tab"></div>
            </div>

            <div class="form-inner">
                <form action="#" class="login">
                    <pre> </pre>
                    <div class="field">
                        <input type="text" placeholder="Masukan Email " required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Masukan Password" required>
                    </div>
                    <div class="pass-link"><a href="#">Lupa password?</a></div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">Buat akun! <a href=""> Daftar sekarang</a></div>
                </form>

                <form action="#" class="signup">
                    <div class="field">
                        <input type="text" placeholder="Masukan Nama" required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Masukan Email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Masukan Password" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Daftar">
                    </div>
                    <div class="signup-link">Sudah punya akun? <a href="">Login</a></div>
                </form>
            </div>
        </div>
    </div>
    <script src="./script.js"></script>

</body>

</html>