<?php
    session_start();
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO kamar VALUES('','$_POST[tipekamar]', $_POST[biayasewa], $_POST[jumlahkamar], '$_POST[fasilitas]', '$_POST[thumb]')");

        if(!$sql) {
            echo '<script>
                    alert("Tambah data gagal");
                    window.open("../admin/data-kamar.php","_self")
                </script>';
        } else {
            echo '<script>
                    alert("Tambah data berhasil");
                    window.open("../admin/data-kamar.php","_self")
                </script>';
        }
    }
?>