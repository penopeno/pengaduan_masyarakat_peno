<!DOCTYPE html>
<html lang="en">
<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
  @header('location:../modul-auth/index.php');
}
// CRUD


if (isset($_POST['hapus'])) {
  $idLama = $_POST['idLama'];
  $q = mysqli_query($con, "DELETE FROM `petugas` WHERE id_petugas = '$idLama'");
}
if (isset($_POST['update'])) {
  $idLama = $_POST['idLama'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $telp = $_POST['telp'];
  $password = md5($_POST['password']);
  if ($password == '') {
    $q = mysqli_query($con, "UPDATE `petugas` SET id_petugas = '$idLama', nama _petugas= '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
  } else {
    $q = mysqli_query($con, "UPDATE `petugas` SET `password` = '$password', id_petugas = '$idLama', nama_petugas = '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
  }
}

?>

<!-- header -->
<?php include('../../assets/header.php') ?>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand d-flex align-items-center m-0" href=" https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html " target="_blank">
        <span class="font-weight-bold text-lg">Corporate UI</span>
      </a>
    </div>
    <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">

      <!-- sidebar -->
      <?php include('../../assets/menu.php') ?>
      <!-- end sidebar -->
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Petugas</li>
          </ol>
          <h6 class="font-weight-bold mb-0">Petugas</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">

            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item ps-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <img src="../../assets/img/team-2.jpg" class="avatar avatar-sm" alt="avatar" />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Petugas list</h6>
                  <p class="text-sm">See information about all Petugas</p>
                </div>
              </div>
            </div>

            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="dataTablesNya">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-center  text-xs font-weight-semibold opacity-7">ID Petugas</th>
                      <th class="text-secondary text-center  text-xs font-weight-semibold opacity-7 ps-2">Nama Petugas</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Username</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Telp</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Update</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q = mysqli_query($con, "SELECT * FROM `petugas`");
                    $no = 1;
                    while ($d = mysqli_fetch_object($q)) { ?>
                      <tr>
                        <td>
                          <h6 class="mb-0 text-center  text-sm font-weight-semibold"><?= $d->id_petugas ?></h6>

                        </td>
                        <td>
                        <h6 class="mb-0 text-center  text-sm font-weight-semibold"><?= $d->nama_petugas ?></h6>
                          </td>
                        <td>
                        <h6 class="mb-0 text-sm  text-center font-weight-semibold"><?= $d->username ?></h6>

                          </td>
                        <td>
                        <h6 class="mb-0 text-sm text-center  font-weight-semibold"><?= $d->telp ?></h6>
                          
                        </td>
                        <td class="mb-0 text-sm text-center font-weight-semibold"><button data-toggle="modal" data-target="#modal-xl<?= $d->id_petugas ?>" class="btn btn-success"><i class="fa fa-pen"></i></button></td>
                        <td class="mb-0 text-sm text-center font-weight-semibold">
                          <form action="" method="post"><input type="hidden" name="idLama" value="<?= $d->id_petugas ?>"><button name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                        </td>
                      </tr>

                      <!-- modal start -->
                      <div class="modal fade" id="modal-xl<?= $d->id_petugas ?>">
                        <div class="modal-dialog modal-xl<?= $d->id_petugas ?>">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Data</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="post">
                              <input type="hidden" name="idLama" value="<?= $d->id_petugas ?>">
                              <div class="modal-body">
                                <div class="form-group"><label for="nama">Nama</label>
                                  <input class="form-control" type="text" name="nama" value="<?= $d->nama_petugas ?>">
                                </div>
                                <div class="form-group"><label for="username">Username</label>
                                  <input class="form-control" type="text" name="username" value="<?= $d->username ?>">
                                </div>
                                <div class="form-group"><label for="username">New Password</label>
                                  <input class="form-control" type="password" name="password" value="">
                                </div>
                                <div class="form-group"><label for="username">Telepon</label>
                                  <input class="form-control" type="number" name="telp" value="<?= $d->telp ?>">
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                              </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- modal - ends -->

                    <?php $no++;
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"></i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Corporate UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-slate-900" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/corporate-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/corporate-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/corporate-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/corporate-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Corporate%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fcorporate-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/corporate-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <?php include('../../assets/footer.php') ?>

</body>

</html>