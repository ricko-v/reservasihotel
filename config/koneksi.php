<?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'reservasihotel');

    if(!$koneksi) {
        echo '<script>alert("Koneksi Database Gagal!")</script>';
    }
?>