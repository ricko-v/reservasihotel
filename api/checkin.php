<?php
    session_start();
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'resepsionis') {
        echo 'Not Found';
    } else {
        $sql = mysqli_query($koneksi, "UPDATE booking SET status='checkin' WHERE id=$_GET[id]");
        if(!$sql) {
            echo "<script>
                    alert('Gagal Checkin Data');
                    window.open('../resepsionis/data-reservasi.php','_self');
                  </script>";
        } else {
            echo "<script>
                    window.open('../resepsionis/data-reservasi.php','_self');
                  </script>";
        }
    }
?>