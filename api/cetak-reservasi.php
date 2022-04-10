<?php
    include '../config/koneksi.php';
    require_once '../component/header.php';

    $getID = '';


    $sql = mysqli_query($koneksi, "INSERT INTO booking VALUES('','$_POST[nmpelanggan]', '$_POST[emailpelanggan]', '$_POST[nohppelanggan]', '$_POST[tglcheckin]', '$_POST[tglcheckout]', '$_POST[totalkamar]', '$_POST[tipekamar]', 'null')");

    if(!$sql) {
        echo "<script>alert('Gagal Membuat Reservasi!".mysqli_errno($koneksi)."')</script>";
    } else {
        $getID = mysqli_query($koneksi, "SELECT MAX(id) AS idpesanan FROM booking");
    }
?>

<div class="p-4">
    <h3 class='fw-bold mb-5'>RESERVASI BERHASIL</h3>
    <p>
        <b>
            <?php while($id=mysqli_fetch_array($getID)) {
                echo "ID RESERVASI " .$id['idpesanan'];
            } ?>
        </b>
    </p>
    <p>Nama: <?php echo $_POST['nmpelanggan'] ?></p>
    <p>Email: <?php echo $_POST['emailpelanggan'] ?></p>
    <p>No. Handphone: <?php echo $_POST['nohppelanggan'] ?></p>
    <p>Tanggal CheckIN: <?php echo $_POST['tglcheckin'] ?></p>
    <p>Tanggal CheckOUT: <?php echo $_POST['tglcheckout'] ?></p>
    <p>Jumlah Kamar: <?php echo $_POST['totalkamar'] ?></p>
    <p>Tipe Kamar: <?php echo $_POST['tipekamar'] ?></p>

    <?php
        $getBiayaSewa = mysqli_query($koneksi, "SELECT biayasewa FROM kamar WHERE tipekamar='$_POST[tipekamar]'");
        $r = mysqli_fetch_array($getBiayaSewa);
        $tgl1 = new DateTime($_POST['tglcheckin']);
        $tgl2 = new DateTime($_POST['tglcheckout']);
        $jarak = $tgl2->diff($tgl1)->days;
    ?>
    <p><b>Total Pembayaran: <?php echo number_format($_POST['totalkamar'] * $r['biayasewa'] * $jarak, '0', '.', '.') ?></b></p>
</div>

<script>
    window.print();
</script>