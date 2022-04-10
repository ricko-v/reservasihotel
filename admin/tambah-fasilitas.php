<?php
    session_start();
    error_reporting(0);
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        require_once '../component/header.php';
        require_once 'component/navbar.php';
?>

<div class='container-fluid bg-silver min-vh-100 pt-5 mt-5'>
    <div class="container d-flex justify-content-center">
        <div class="card col-12 col-lg-9 p-3">
            <h4>Tambah Kamar</h4>
            <hr>
            <form action="../api/tambah-fasilitas.php?" method="post">
                <label class='mb-2'>Nama Fasilitas</label>
                <input name='nmfasilitas' class='form-control mb-3'">

                <label class='mb-2'>Thumbnail</label>
                <input name='thumb' class='form-control mb-3'">

                <div>
                    <button class='btn btn-success shadow-none'>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require_once '../component/footer.php';
    }
?>