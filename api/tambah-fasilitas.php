<?php
    session_start();
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO fasilitas VALUES('','$_POST[nmfasilitas]', '$_POST[thumb]')");

        if(!$sql) {
            echo '<script>
                    alert("Tambah data gagal");
                    window.open("../admin/data-fasilitas.php","_self")
                </script>';
        } else {
            echo '<script>
                    alert("Tambah data berhasil");
                    window.open("../admin/data-fasilitas.php","_self")
                </script>';
        }
    }
?>