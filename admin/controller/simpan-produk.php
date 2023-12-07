<?php
    include '../../config/index.php';
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];

    $gambar       = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $x           = explode('.', $gambar);
    $ekstensi    = strtolower(end($x));
    $ekstensi_diperbolehkan = array('jpg', 'png', 'jpeg', 'webp');
    $tmp_file    = $_FILES['gambar']['tmp_name'];
    $path        = "../../upload/image/" . $gambar;

    if ( in_array($ekstensi, $ekstensi_diperbolehkan) === true ){
        if ( $ukuran_file <= 100000000 ) {
            if ( move_uploaded_file($tmp_file, "$path") ) {
                echo "Berhasill Upload gambar";
                $input = mysqli_query($conn, "INSERT INTO `product` (`nama_barang`, `harga`, `deskripsi`, `stok`, `gambar`) VALUES('$nama', '$harga', '$deskripsi', '$stok', '$gambar')") or die(mysqli_error($koneksi));
                if($input){
                    echo "Data Berhasil Disimpan";
                    header("location: ../view/produk.php");
                }else{
                    echo "Gagal Disimpan";
                }
            }
        }
    }

   

    
?>