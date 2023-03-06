<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
  @header('location:../modul-auth/index.php');
} else {
  if ($_SESSION['level'] == 'masyarakat') {
    $nik = $_SESSION['nik'];
  }
}
// CRUD
if (isset($_POST['tambahPengaduan'])) {
  $isi_laporan = $_POST['isi_laporan'];
  $tgl = $_POST['tgl_pengaduan'];
  //upload
  $ekstensi_diperbolehkan = array('jpg', 'png');
  $foto = $_FILES['foto']['name'];
  $x = explode(".", $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  if (!empty($foto)) {
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '$foto', '0')";
      $r = mysqli_query($con, $q);
      if ($r) {
        move_uploaded_file($file_tmp, '../../assets/images/masyarakat/' . $foto);
      }
    }
  } else {
    $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '', '0')";
    $r = mysqli_query($con, $q);
  }
}

// hapus pengaduan
if (isset($_POST['hapus'])) {
  $id_pengaduan = $_POST['id_pengaduan'];
  if ($id_pengaduan != '') {
    $q = "SELECT `foto` FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
    $r = mysqli_query($con, $q);
    $d = mysqli_fetch_object($r);
    unlink('../../assets/images/masyarakat/' . $d->foto);
  }
  $q = "DELETE FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
  $r = mysqli_query($con, $q);
}

// rubah status pengaduan
if (isset($_POST['proses_pengaduan'])) {
  $id_pengaduan = $_POST['id_pengaduan'];
  $status = $_POST['status'];
  $q = "UPDATE `pengaduan` SET status = '$status' WHERE id_pengaduan = '$id_pengaduan'";
  $r = mysqli_query($con, $q);
}
?>
<!DOCTYPE html>
<html lang="en">

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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengaduan</li>
          </ol>
          <h6 class="font-weight-bold mb-0">Pengaduan</h6>
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
                  <h6 class="font-weight-semibold text-lg mb-0">Pengaduan list</h6>
                  <p class="text-sm">See information about all Pengaduan</p>
                </div>
                <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                  <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Add Laporan
                  </button>
                <?php } ?>

              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header no-bd">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold">
                        Add</span>
                      <span class="fw-light">
                        Laporan
                      </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label>Isi Laporan</label>
                            <textarea name="isi_laporan" class="form-control" cols="30" rows="10"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6 pr-0">
                          <div class="form-group form-group-default">
                            <label>Tanggal</label>
                            <input id="addPosition" type="date" name="tgl_pengaduan" class="form-control" placeholder="ketikan">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Foto</label>
                            <input id="addOffice" type="file" name="foto" class="form-control" placeholder="ketikan">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer no-bd">
                        <button type="submit" name="tambahPengaduan" value="simpan" id="addRowButton" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <!-- end modal  -->

            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="dataTablesNya">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-center text-xs font-weight-semibold opacity-7">Tanggal</th>
                      <th class="text-secondary text-xs  font-weight-semibold opacity-7 ps-2">NIK</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Isi Laporan</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Foto</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                      <?php if ($_SESSION['level'] == 'masyarakat') { ?>

                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Hapus</th>
                      <?php } ?>
                      <?php if ($_SESSION['level'] == 'petugas') { ?>

                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Proses Pengaduan</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($_SESSION['level'] == 'masyarakat') {
                      $q = "SELECT * FROM `pengaduan` WHERE `nik` = $nik";
                    } else {
                      $q = "SELECT * FROM `pengaduan`";
                    }
                    $r = mysqli_query($con, $q);
                    $no = 1;
                    while ($d = mysqli_fetch_object($r)) {
                    ?>
                      <tr>
                        <td>
                          <h6 class="mb-0 text-sm font-weight-semibold text-center  "><?= $d->tgl_pengaduan ?></h6>

                        </td>
                        <td>
                          <h6 class="mb-0 text-sm font-weight-semibold"><?= $d->nik ?></h6>


                        </td>
                        <td>
                          <h6 class="mb-0 text-sm font-weight-semibold text-center"><?= $d->isi_laporan ?></h6>


                        </td>
                        <td class="text-center">
                          <?php if ($d->foto == '') {
                            echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/no-foto.png">';
                          } else {
                            echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/masyarakat/' . $d->foto . '">';
                          } ?>
                        </td>
                        <td class="text-center">
                          <h6 class="mb-0 text-sm font-weight-semibold"><?= $d->status ?></h6>


                        </td>
                        <?php if ($_SESSION['level'] == 'masyarakat') { ?>

                          <td class="text-center">
                            <form action="" method="post"><input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>"><button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                          </td>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'petugas') { ?>

                          <td class="text-center"> 
                            <form action="" method="post">
                              <input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>">
                              <select class="form-control" name="status">
                                <option value="0"> 0 </option>
                                <option value="proses"> proses </option>
                                <option value="selesai"> selesai </option>
                              </select><br>
                              <button type="submit" name="proses_pengaduan" class="btn btn-success form-control">ubah</button>
                            </form>
                          </td>
                        <?php } ?>

                      </tr>
                    <?php $no++;
                    } ?>

                    <!-- <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex align-items-center">
                            <img src="../../assets/img/team-2.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold">John Michael</h6>
                            <p class="text-sm text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm text-dark font-weight-semibold mb-0">Manager</p>
                        <p class="text-sm text-secondary mb-0">Organization</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm border border-success text-success bg-success">Online</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-normal">23/04/18</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                          <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                          </svg>
                        </a>
                      </td>
                    </tr> -->

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