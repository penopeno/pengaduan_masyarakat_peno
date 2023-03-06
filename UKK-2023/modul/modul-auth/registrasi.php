<?php
include('../../config/database.php');
if (isset($_POST['simpan'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$telp = $_POST['telp'];
	$q = mysqli_query($con, "INSERT INTO `masyarakat` (nik, nama, username, password, telp, verifikasi) VALUES ('$nik', '$nama', '$username', '$password', '$telp', 0)");
	if ($q) {
		echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                Registrasi Berhasil Tunggu verifikasi oleh admin
                </div>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php include('../../assets/header.php') ?>


<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                                <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8" style="background-image:url('../../assets/img/image-sign-up.jpg')">
                                    <div class="my-auto text-start max-width-350 ms-7">
                                        <h1 class="mt-3 text-white font-weight-bolder">Start your <br> new journey.</h1>
                                        <p class="text-white text-lg mt-4 mb-4">Use these awesome forms to login or create new account in your project for free.</p>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-group d-flex">
                                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Jessica Rowland">
                                                    <img alt="Image placeholder" src="../../assets/img/team-3.jpg" class="">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Audrey Love">
                                                    <img alt="Image placeholder" src="../../assets/img/team-4.jpg" class="rounded-circle">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Michael Lewis">
                                                    <img alt="Image placeholder" src="../../assets/img/marie.jpg" class="rounded-circle">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-original-title="Audrey Love">
                                                    <img alt="Image placeholder" src="../../assets/img/team-1.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                            <p class="font-weight-bold text-white text-sm mb-0 ms-2">Join 2.5M+ users</p>
                                        </div>
                                    </div>
                                    <div class="text-start position-absolute fixed-bottom ms-7">
                                        <h6 class="text-white text-sm mb-5">Copyright © 2022 Corporate UI Design System by Creative Tim.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6">Sign up</h3>
                                    <p class="mb-0">Nice to meet you! Please enter your details.</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="post">
                                        <label>NIK</label>
                                        <div class="mb-3">
                                            <input type="text"  name="nik" class="form-control" placeholder="Enter your NIK" aria-label="nik" aria-describedby="name-addon">
                                        </div>
                                        <label>Name</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama" class="form-control" placeholder="Enter your name" aria-label="Name" aria-describedby="name-addon">
                                        </div>
                                        <label>Username</label>
                                        <div class="mb-3">
                                            <input type="text" name="username" class="form-control" placeholder="Enter your Username" aria-label="Email">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Create a password" aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                        <label>No Telp</label>
                                        <div class="mb-3">
                                            <input type="text" name="telp" class="form-control" placeholder="Enter your Telp" aria-label="telp" aria-describedby="name-addon">
                                        </div>
                                        <div class="text-center">
                                            <button name="simpan" type="submit" type="button" class="btn btn-dark w-100 mt-4 mb-3">Sign up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-xs mx-auto">
                                        Already have an account?
                                        <a href="index.php" class="text-dark font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>