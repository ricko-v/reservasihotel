<?php
    session_start();
    error_reporting(0);
    include '../config/koneksi.php';

    if($_SESSION['role'] == 'admin') {
        header('location:../admin');
    } else if($_SESSION['role'] == 'resepsionis') {
        header('location:../resepsionis');
    } else {
        $password = md5($_POST['password']);
        $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$_POST[username]' AND password='$password'");
        $r = mysqli_fetch_array($sql);

        if(mysqli_num_rows($sql) > 0) {
            $_SESSION['role'] = $r['role'];
            if($r['role'] == 'admin') {
                header('location:../admin');
            } else if($r['role'] == 'resepsionis') {
                header('location:../resepsionis');
            }
        } else {
            echo "<script>
                    alert('username atau password salah!');
                    window.open('/reservasihotel/login.php','_self');
                  </script>";
        }
    }
?>