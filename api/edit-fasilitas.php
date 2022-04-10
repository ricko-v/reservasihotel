<?php
    session_start();
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        $sql = mysqli_query($koneksi, "UPDATE fasilitas SET nmfasilitas='$_POST[nmfasilitas]', thumb='$_POST[thumb]' WHERE id=$_GET[id]");

        if(!$sql) {
            echo '<script>
                    alert("update data gagal");
                    window.open("../admin/edit-fasilitas.php","_self")
                </script>';
        } else {
            echo '<script>
                    alert("update data berhasil");
                    window.open("../admin/data-fasilitas.php","_self")
                </script>';
        }
    }
?>