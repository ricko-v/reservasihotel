<?php
    session_start();
    error_reporting(0);
    if($_SESSION['role'] !== 'admin') {
       echo 'Not Found!'; 
    } else {
        require_once '../component/header.php';
        require_once 'component/navbar.php';
?>

<div class="container-fluid min-vh-100 bg-silver mt-5 pt-5">
    <div class="container">
        <div class="card w-100 bg-white rounded p-3">
            <h5 class='mb-0 pb-0'>Selamat Datang Admin</h3>
            <hr>
        </div>
    </div>
</div>

<?php
        require_once '../component/footer.php';
    }
?>