<?php
    session_start();
    error_reporting(0);
    require_once 'component/header.php';

    if($_SESSION['role'] == 'admin') {
        header('location:admin');
    } else if($_SESSION['role'] == 'resepsionis') {
        header('location:resepsionis');
    }
?>

<div class='bg-silver container-fluid min-vh-100 d-flex align-items-center justify-content-center'>
    <div class="card p-3 rounded shadow-sm col-lg-4">
        <h3 class='text-center mb-4 fw-bold'>Login Page</h3>
        <form action="api/cek-login.php" method="post">
            <label class='d-block mb-2'>Username:</label>
            <input class='shadow-none form-control mb-3' name='username'>
            <label class='d-block mb-2'>Pasword:</label>
            <input class='shadow-none form-control mb-3' name='password' type='password'>
            <button class='btn btn-success shadow-none'>Login</button>
        </form>
    </div>
</div>

<?php
    require_once 'component/footer.php';
?>