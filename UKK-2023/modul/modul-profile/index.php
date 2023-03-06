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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
          </ol>
          <h6 class="font-weight-bold mb-0">Profile</h6>
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
        <div class="col-md-12">

          <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') { ?>

            <div class="col-md-8 mb-4">
              <div class="card border shadow-xs">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-5">
                      <div class="card card-background card-background-after-none align-items-start mb-2">
                        <div class="full-background" style="background-image: url('../../assets/img/curved-images/img-6.jpg')"></div>
                        <div class="card-body text-start ps-3 pe-2 pt-2 pb-2 w-100">
                          <div class="row">
                            <div class="col-8 py-2">
                              <p class="text-white text-sm font-weight-bold mb-6"><?= $_SESSION['username'] ?></p>
                              <div class="d-flex align-items-center mb-0 mt-auto">
                                <p class="font-weight-semibold mb-0"><?= $_SESSION['nama_petugas'] ?></p>
                                <span class="ms-auto text-xs font-weight-bolder text-pt-mono"><?= $_SESSION['id_petugas'] ?></span>
                              </div>
                              <span class="ms-auto text-sm font-weight-bolder text-pt-mono"><?= $_SESSION['telp'] ?></span>
                            </div>
                            <div class="col-4">
                              <div class="blur d-flex flex-column w-80 h-100 py-2 ms-auto border-radius-lg border border-white">
                                <div class="text-center w-100">
                                  <img src="../../assets/img/logos/wifi-white.png" class="w-25 mx-auto" alt="wifi" />
                                </div>
                                <div class="text-center mt-auto w-100">
                                  <img src="../../assets/img/logos/mastercard-white.png" class="w-40 mx-auto mt-2" alt="mastercard" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-wrapper w-100 mb-lg-0 mb-5">
                        <div class="d-flex align-items-center mb-2">
                          <span class="text-sm font-weight-semibold">This month</span>
                          <p class="text-dark font-weight-bold ms-auto mb-0">$56,982.20</p>
                        </div>
                        <div class="progress">
                          <div class="progress-bar progress-bar-lg bg-gradient-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php if ($_SESSION['level'] == 'masyarakat') { ?>

            <div class="col-md-8 mb-4">
              <div class="card border shadow-xs">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-5">
                      <div class="card card-background card-background-after-none align-items-start mb-2">
                        <div class="full-background" style="background-image: url('../../assets/img/curved-images/img-6.jpg')"></div>
                        <div class="card-body text-start ps-3 pe-2 pt-2 pb-2 w-100">
                          <div class="row">
                            <div class="col-8 py-2">
                              <p class="text-white text-sm font-weight-bold mb-6"><?= $_SESSION['username'] ?></p>
                              <div class="d-flex align-items-center mb-0 mt-auto">
                                <p class="font-weight-semibold mb-0"><?= $_SESSION['nama'] ?></p>
                                <span class="ms-auto text-xs font-weight-bolder text-pt-mono"><?= $_SESSION['nik'] ?></span>
                              </div>
                              <span class="ms-auto text-sm font-weight-bolder text-pt-mono"><?= $_SESSION['telp'] ?></span>
                            </div>
                            <div class="col-4">
                              <div class="blur d-flex flex-column w-80 h-100 py-2 ms-auto border-radius-lg border border-white">
                                <div class="text-center w-100">
                                  <img src="../../assets/img/logos/wifi-white.png" class="w-25 mx-auto" alt="wifi" />
                                </div>
                                <div class="text-center mt-auto w-100">
                                  <img src="../../assets/img/logos/mastercard-white.png" class="w-40 mx-auto mt-2" alt="mastercard" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-wrapper w-100 mb-lg-0 mb-5">
                        <div class="d-flex align-items-center mb-2">
                          <span class="text-sm font-weight-semibold">This month</span>
                          <p class="text-dark font-weight-bold ms-auto mb-0">$56,982.20</p>
                        </div>
                        <div class="progress">
                          <div class="progress-bar progress-bar-lg bg-gradient-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

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