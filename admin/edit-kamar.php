<?php
    session_start();
    error_reporting(0);
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'admin') {
        echo 'Not Found';
    } else {
        require_once '../component/header.php';
        require_once '../admin/component/navbar.php';
        $sql = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id='$_GET[id]'");
        while($r=mysqli_fetch_array($sql)) {
?>

<div class='container-fluid bg-silver min-vh-100 pt-5 mt-5 pb-5'>
    <div class="container d-flex justify-content-center">
        <div class="card col-12 col-lg-9 p-3">
            <h4>Edit Kamar</h4>
            <hr>
            <form action="../api/edit-kamar.php?id=<?php echo $r['id'] ?>" method="post">
                <label class='mb-2'>Id Kamar</label>
                <input disabled class='form-control mb-3' value="<?php echo $r['id'] ?>">
                
                <label class='mb-2'>Tipe Kamar</label>
                <input name='tipekamar' class='form-control mb-3' value="<?php echo $r['tipekamar'] ?>">
                
                <label class='mb-2'>Jumlah Kamar</label>
                <input name='jumlahkamar' type='number' class='form-control mb-3' value="<?php echo $r['jumlahkamar'] ?>">
                
                <label class='mb-2'>Thumbnail</label>
                <input name='thumb'class='form-control mb-3' value="<?php echo $r['thumb'] ?>">

                <label class='mb-2'>Biaya Sewa</label>
                <input name='biayasewa' type='number' class='form-control mb-3' value="<?php echo $r['biayasewa'] ?>">
                
                <label class='mb-2'>Fasilitas Kamar</label>
                
                <textarea name='fasilitas' class='form-control mb-3'><?php echo $r['fasilitas'] ?></textarea>
                
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