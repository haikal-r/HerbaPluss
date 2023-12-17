<?php
session_start();

include 'index.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Fetch data
$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama='$username'");
if (mysqli_num_rows($data) > 0) {
    $row = mysqli_fetch_assoc($data);
    // cek password
    if (password_verify($password, $row["password"])) {
        // set session
        $_SESSION['id_user'] = $row['id_pengguna'];
        $_SESSION['username'] = $row['nama'];
        $_SESSION['alamat'] = $row['alamat'];
        $_SESSION['nomor_telepon'] = $row['nomor_telepon'];
        $_SESSION["role"] = $row['role'];
        $_SESSION["login"] = true;

        if ($_SESSION["role"] == "penjual") {
            header("Location: ../admin/");
        } else {
            header("Location: ../user/");
        }
    } else {
        echo "
        <script>
            alert('Password salah')
            window.location.href = '../login.php'
        </script>
                ";
    }
} else {
    echo "
        <script>
            alert('Username salah')
            window.location.href = '../login.php'
        </script>
        ";
}
