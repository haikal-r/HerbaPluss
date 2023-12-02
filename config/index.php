<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "minipbl");

if(!$conn) {
        echo "Failed connect";
}else{
    echo "Succes connect";
}
?>