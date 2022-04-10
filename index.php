<?php

    include 'config/koneksi.php';
    require_once 'component/header.php';
    require_once 'component/navbar.php';

    $data = mysqli_query($koneksi, "SELECT * FROM kamar");
?>

<div id='main' class="container-fluid bg-hero min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class='col-12 col-md-6 col-lg-6 d-flex align-items-center text-white'>
                <div>
                    <h3 class='fw-bold'>Selamat Datang di JAYA HOTEL</h3>
                    <p class='text-white'>Pesan Langsung untuk Mendapatkan Penawaran Eksklusif dan <br> Tarif Termurah Setiap Hari Dari Situs Web Resmi Kami.</p>
                    <a href='booking.php'>
                        <button class='btn btn-primary shadow-none'>Pesan Sekarang</button>
                    </a>
                </div>
            </div>
            <div class='col-12 d-md-block d-none col-md-6 col-lg-6 mt-5'>
                <img src='assets/img/hero.svg' class='img-fluid ms-5'>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-white pt-5">
    <div class="row">
        <div class='col-12 col-md-2 col-lg-2'></div>
        <div class='col-12 col-md-8 col-lg-8'>
            <div class="bg-white border-dark border w-100 p-3 rounded shadow">
                <form action='booking.php' class='d-md-flex d-block justify-content-between align-items-center' method='POST'>
                    <div class='d-md-flex d-block'>
                        <div class='me-5'>
                            <small>Tanggal CheckIN</small>
                            <input required name='tglcheckin' class='form-control shadow-none my-2' type='date'>
                        </div>
                        <div class='me-5'>
                            <small>Tanggal CheckIN</small>
                            <input required name='tglcheckout' class='form-control shadow-none my-2' type='date'>
                        </div>
                        <div>
                            <small>Jumlah Kamar</small>
                            <input required name='totalkamar' class='form-control shadow-none my-2' type='number'>
                        </div>
                    </div>
                    <div>
                        <small> </small>
                        <br>
                        <button type='submit' class='btn btn-primary shadow-none'>Pesan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='col-12 col-md-2 col-lg-2'></div>
    </div>
</div>

<div id='kamar' class='mb-5'></div>
<div class="container-fluid bg-silver pt-5">
    <div class="container">
        <div class=" mb-5">
            <h3 class='fw-bold text-center'>Daftar Kamar</h3>
        </div>
        <div class='row'>
            <?php
                while($r = mysqli_fetch_array($data)) {
            ?>
            <div class='col-12 col-md-6 col-lg-3 mb-5'>
                <div class="card h-100 rounded shadow-sm">
                    <div class='card-img-top'>
                        <img class='img-fluid img-kamar' src='assets/img/kamar/<?php echo $r['thumb'] ?>'>
                    </div>
                    <div class="card-body p-0">
                        <h4 class='px-3 mt-3'>Kamar <i><?php echo $r['tipekamar'] ?></i></h4>
                        <span class='px-3'>Rp <?php echo number_format($r['biayasewa'], '0', ',' ,'.'); ?> / hari</span>
                        <div class='mt-3 border-top border-secondary'>
                            <div class='rounded pt-3'>
                                <ul>
                                    <?php
                                        $fasilitas = explode("\n",$r['fasilitas']);
                                        foreach($fasilitas as $info) {
                                    ?>

                                    <li> <?php echo $info ?></li>

                                    <?php 
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='card-footer bg-white text-center'>
                        <a href='booking.php?tipe=<?php echo $r['tipekamar'] ?>' class='h6'>
                            <button class='btn w-100 btn-outline-primary rounded shadow-none'>Pesan Kamar</button>
                        </a>
                    </div>
                </div>
            </div>

            <?php
                }
            ?>
        </div>
    </div>
</div>

<div id='fasilitas' class="container-fluid bg-silver pt-5">
    <div class="container">
        <div class=" mb-5">
            <h3 class='fw-bold text-center'>Fasilitas Hotel</h3>
        </div>
        <div class='row'>
            <?php
                $no = 1;
                $fasilitas = mysqli_query($koneksi, "SELECT * FROM fasilitas");
                while($f = mysqli_fetch_array($fasilitas)) {
            ?>
            <div class='col-12 col-md-6 col-lg-3 mb-5'>
                <div class="card h-100 rounded shadow">
                    <div class='card-img-top rounded'>
                        <img class='img-fluid rounded' src='assets/img/fasilitas/<?php echo $f['thumb'] ?>'>
                    </div>
                    <div class="card-body p-0">
                        <h4 class='px-3 my-3 text-center'><i><?php echo $f['nmfasilitas'] ?></i></h4>
                    </div>
                </div>
            </div>
            <?php
                $no++;
                }
            ?>
        </div>
    </div>
</div>

<?php
    require_once 'component/footer.php'
?>