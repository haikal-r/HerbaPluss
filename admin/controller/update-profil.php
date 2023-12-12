<?php
// include database connection file
include '../../config/index.php';
$id = $_GET['id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email=$_POST['email'];
$alamat=$_POST['alamat'];
$result = mysqli_query($conn, "UPDATE user SET
username = '$username',password = '$password',role = 'penjual',email='$email',alamat='$alamat' WHERE id_user = '$id'");
// Redirect to homepage to display updated user in list
if($result){
    echo "
    <script>
        alert('data berhasil diubah');
        window.location.href = '../view/profil.php'
    </script>
    ";
    
}
?>