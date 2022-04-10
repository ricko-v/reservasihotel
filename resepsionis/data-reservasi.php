<?php
    session_start();
    error_reporting(0);
    include '../config/koneksi.php';

    if($_SESSION['role'] !== 'resepsionis') {
        echo 'not found';
    } else {
        require_once '../component/header.php';
        require_once 'component/navbar.php';

        if(isset($_GET['q'])) {
            $q = $_GET['q'];
            $sql = mysqli_query($koneksi, "SELECT * FROM booking WHERE id LIKE '%$q%' OR nmpelanggan LIKE '%$q%' OR tglcheckin LIKE '%$q%' OR tglcheckout LIKE '%$q%' OR tipekamar LIKE '%$q%'");
        } else {
            $sql = mysqli_query($koneksi, "SELECT * FROM booking");
        }
?>

<div class="container-fluid bg-silver min-vh-100 pt-5 mt-5">
    <div class="card container  mb-4 p-3">
        <div class='d-md-flex d-block align-items-center justify-content-between'>
            <div>
                <h4>Data Reservasi</h4>
            </div>
            <div>
                <input placeholder='cari data...' type="text" onkeypress="cari(event, this.value)" class='form-control shadow-none border border-secondary'>
            </div>
        </div>
    </div>
    <div class="card container p-3 overflow-auto">
        <table class='table text-center table-borderglass'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>tgl checkin</th>
                    <th>tgl checkout</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;

                    while($r=mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $r['nmpelanggan'] ?></td>
                    <td><?php echo $r['tglcheckin'] ?></td>
                    <td><?php echo $r['tglcheckout'] ?></td>
                    <td>
                        <?php
                            if($r['status'] == 'null') {
                                echo "<a onclick='return confirm(`yakin ingin checkin?`)' class='m-0' href='../api/checkin.php?id=".$r['id']."'>checkin</a>";
                            } else {
                                echo "<span class='text-secondary'>checkin</span>";
                            }
                        ?>
                        /
                        <?php
                            if($r['status'] == 'checkin') {
                                echo "<a class='m-0' onclick='return confirm(`yakin ingin checkout?`)' href='../api/checkout.php?id=".$r['id']."'>checkout</a>";
                            } else {
                                echo "<span class='text-secondary'>checkout</span>";
                            }
                        ?>
                    </td>
                </tr>
                <?php
                        $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function cari(e,q) {
        if(e.key == 'Enter') {
            window.open('?q='+q,'_self');
        }
    }
</script>

<?php
    require_once '../component/footer.php';
    }
?>