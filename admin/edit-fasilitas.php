<?php
    session_start();
    error_reporting(0);
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        require_once '../component/header.php';
        require_once '../admin/component/navbar.php';
        $sql = mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id='$_GET[id]'");
        while($r=mysqli_fetch_array($sql)) {
?>

<div class='container-fluid bg-silver min-vh-100 pt-5 mt-5 pb-5'>
    <div class="container d-flex justify-content-center">
        <div class="card col-12 col-lg-9 p-3">
            <h4>Edit Fasilitas</h4>
            <hr>
            <form action="../api/edit-fasilitas.php?id=<?php echo $r['id'] ?>" method="post">
                <label class='mb-2'>Id Fasilitas</label>
                <input disabled class='form-control mb-3' value="<?php echo $r['id'] ?>">
                
                <label class='mb-2'>Nama Fasilitas</label>
                <input name='nmfasilitas' class='form-control mb-3' value="<?php echo $r['nmfasilitas'] ?>">
                
                <label class='mb-2'>Thumbnail</label>
                <input name='thumb' class='form-control mb-3' value="<?php echo $r['thumb'] ?>">

                <div>
                    <button class='btn btn-success shadow-none'>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
        }
    require_once '../component/footer.php';
    }

?>