<?php
session_start();

include 'index.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Fetch data
$data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($data) > 0){
        $row = mysqli_fetch_array($data); // Membuat SESSION

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];

        header("location: ../user/index.php");
    }else{
        echo "
        <script>
            alert('Data tidak valid')
            window.location.href = '../login.php'
        </script>
        ";
        
        
    }
?>  