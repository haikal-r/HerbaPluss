<?php
// include database connection file
require '../config/index.php';
$id = $_GET['id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$nomor = $_POST['nomor'];

$gambar       = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$x           = explode('.', $gambar);
$ekstensi    = strtolower(end($x));
$ekstensi_diperbolehkan = array('jpg', 'png', 'jpeg', 'webp');
$tmp_file    = $_FILES['gambar']['tmp_name'];
$path        = "../upload/image/" . $gambar;

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran_file <= 100000000) {
        if (move_uploaded_file($tmp_file, "$path")) {
            echo "Berhasill Upload gambar";
            $result = mysqli_query($conn, "UPDATE user SET
            username = '$username',password = '$password',role = 'pembeli',email='$email',alamat='$alamat',nomor_telepon='$nomor' , gambar='$gambar' WHERE id_user = '$id'");
            // Redirect to homepage to display updated user in list
            if ($result) {
                echo "
                <script>
                    alert('data berhasil diubah');
                    window.location.href = 'profil.php'
                </script>
                ";
            }
        }
    }
}
