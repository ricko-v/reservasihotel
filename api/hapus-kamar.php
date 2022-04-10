<?php
    session_start();
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        $sql = mysqli_query($koneksi, "DELETE FROM kamar WHERE id=$_GET[id]");
        if(!$sql) {
            echo "<script>
                    alert('Gagal Hapus Data');
                    window.open('../admin/data-kamar.php','_self');
                  </script>";
        } else {
            echo "<script>
                    window.open('../admin/data-kamar.php','_self');
                  </script>";
        }
    }
?>