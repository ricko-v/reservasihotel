<?php
    session_start();
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        $sql = mysqli_query($koneksi, "UPDATE kamar SET tipekamar='$_POST[tipekamar]', jumlahkamar=$_POST[jumlahkamar], biayasewa=$_POST[biayasewa], fasilitas='$_POST[fasilitas]', thumb='$_POST[thumb]' WHERE id=$_GET[id]");

        if(!$sql) {
            echo '<script>
                    alert("update data gagal");
                    window.open("../admin/edit-kamar.php","_self")
                </script>';
        } else {
            echo '<script>
                    alert("update data berhasil");
                    window.open("../admin/data-kamar.php","_self")
                </script>';
        }
    }
?>