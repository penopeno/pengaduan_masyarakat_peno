<?php
include('../../config/database.php');
if (isset($_POST['cek'])) {
  $pilihan = $_POST['pilihan']; //masyarakat atau petugas
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  if ($pilihan == 'masyarakat') {
    $q = mysqli_query($con, "SELECT * FROM `masyarakat` WHERE username = '$username' AND password = '$password' AND verifikasi = 1");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['nik'] = $d->nik;
      $_SESSION['username'] = $d->username;
      $_SESSION['nama'] = $d->nama;
      $_SESSION['telp'] = $d->telp;
      $_SESSION['level'] = 'masyarakat';
      @header('location:../../modul/modul-profile/');
    } else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-black">Data salah atau belum di verifikasi</strong></div>';
    }
  } else if ($pilihan == 'petugas') {
    $q = mysqli_query($con, "SELECT * FROM `petugas` WHERE username = '$username' AND password = '$password'");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['username'] = $d->username;
      $_SESSION['nama_petugas'] = $d->nama_petugas;
      $_SESSION['level'] = $d->level;
      $_SESSION['id_petugas'] = $d->id_petugas;
      $_SESSION['telp'] = $d->telp;
      if ($_SESSION['level'] == 'admin') {
        @header('location:../../modul/modul-profile/');
      }
      if ($_SESSION['level'] == 'petugas') {
        @header('location:../../modul/modul-profile/');
      }
    } else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-black">Data salah atau belum di verifikasi</strong></div>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- header -->
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
            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6">Welcome back</h3>
                  <p class="mb-0">Welcome back! Please enter your details.</p>
                </div>
                <div class="card-body">
                  <form role="form" method="post">
                    <label>Username</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Enter your username" name="username" aria-label="Name" aria-describedby="name-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Enter password" name="password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <label for="pilihan">LOGIN SEBAGAI</label>
                    <div class="form-group">
                      <select class="form-control" name="pilihan">
                        <option value="masyarakat">masyarakat</option>
                        <option value="petugas">Petugas</option>
                      </select>
                    </div>
                    <div class="text-center">
                      <button name="cek" type="submit" type="button" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-xs mx-auto">
                    Don't have an account?
                    <a href="./registrasi.php" class="text-dark font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8" style="background-image:url('../../assets/img/image-sign-in.jpg')">
                  <div class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                    <h2 class="mt-3 text-dark font-weight-bold">Enter our global community of developers.</h2>
                    <h6 class="text-dark text-sm mt-5">Copyright © 2022 Corporate UI Design System by Creative Tim.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src=".././assets/js/core/popper.min.js"></script>
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