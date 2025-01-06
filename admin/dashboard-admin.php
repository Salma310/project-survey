<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/styleDashboard.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex flex-direction-column justify-content-center align-items-center mt-2">
                <button id="toggle-btn" type="button">
                    <img src="../assets/images/logo-polinema.png" alt="logo" class="rounded-circle ms-xl-1" width="50px">
                </button>
                <div class="sidebar-logo">
                    <span class="fw-bold">Survey.<span style="color: #03045E;">Ku</span></span>
                    <span class=" campus d-block fw-semibold">POLITEKNIK NEGERI MALANG</span>
                </div>
            </div>
            
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="dashboard-admin.php" class="sidebar-link bg-white rounded-3 mb-3">
                        <img src="../assets/icon/Home.png" alt="icon-overview" width="18px">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item mb-3">
                    <a href="survey.php" class="sidebar-link">
                    <img src="../assets/icon/logo-survey.png" alt="icon-workspace" width="18px">
                        <span>Survey</span>
                    </a>
                </li>
                <li class="sidebar-item mb-3">
                    <a href="umpan-balik.php" class="sidebar-link">
                        <img src="../assets/icon/Feedback.png" alt="icon-feedback" width="18px">
                        <span>Umpan Balik</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="analitik.php" class="sidebar-link">
                        <img src="../assets/icon/Analytics.png" alt="icon-analytics" width="18px">
                        <span>Analitik</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../public/logout.php" class="sidebar-footer-link">
                    <img src="../assets/icon/Logout.png" alt="icon-logout" width="18px">
                    <span>Log out</span>
                </a>
            </div>
        </aside>

        <div class="main">
            <div class=" header d-flex justify-content-between ms-5 mt-4 mb-4 me-4">
                <div class="header-info">
                    <h1 class="fw-bold">
                        Selamat Pagi, Agung
                    </h1>
                    <p class="desc mb-3">Presentasi singkat tentang informasi penting</p>
                </div>
                <a href="../admin/profil-admin.php">
                    <img src="../assets/icon/user.png" alt="profil" width="55px" height="55px" class="rounded-circle">
                </a>
            </div>
            <hr style="border: 2px solid #e6e6e6;">
            <div class="content d-flex justify-content-between gap-5">
                <div class="statistics ms-5">
                    <h5 class="fw-semibold">Statistik</h5>
                    <p class="desc mb-4">Temukan, buat, dan publikasikan ruang Anda</p>
                    <div class="group-cards d-flex align-items-baseline gap-5">
                        <div class="card">
                            <div class="card-body d-flex flex-column-reverse">
                              <h5 class="card-title fw-semibold mt-1">12,836</h5>
                              <p class="card-text">Pelihat</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body d-flex flex-column-reverse">
                              <h5 class="card-title fw-semibold mt-1">412</h5>
                              <p class="card-text">Survey</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body d-flex flex-column-reverse">
                              <h5 class="card-title fw-semibold mt-1">9,648</h5>
                              <p class="card-text">Jawaban</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border: 2px solid #e6e6e6; height: 100%; position: absolute;
                left: 66%; top: 108px;">
                <aside class="me-5">
                    <h5 class="fw-semibold">Survey baru-baru ini</h5>
                    <p class="desc">Temukan, buat, dan publikasikan ruang Anda</p>
                    <div class="group-survey d-flex flex-column gap-4">
                        <a href="../admin/survey-mhs.php">
                            <div class="card" style="background-image: url(../assets/images/img-mhs.png); background-size: cover; background-position-y: -25px; background-repeat: no-repeat;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                  <h6 class="card-subtitle fw-semibold">Mahasiswa</h6>
                                  <p class="card-text text-light fw-medium">4 Survey</p>
                                </div>
                            </div>
                        </a>
                        <a href="../admin/survey-industri.php">
                            <div class="card" style="background-image: url(../assets/images/img-industry.png); background-size: cover; background-repeat: no-repeat; background-position-y: -40px;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                  <h6 class="card-subtitle fw-semibold">Industri</h6>
                                  <p class="card-text text-light fw-medium">2 Survey</p>
                                </div>
                            </div>
                        </a>
                        <a href="../admin/survey-dosen.php">
                            <div class="card" style="background-image: url(../assets/images/img-dosen.png); background-size: cover; background-repeat: no-repeat; background-position-y: -1px;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                  <h6 class="card-subtitle fw-semibold text-light">Dosen</h6>
                                  <p class="card-text text-light fw-medium">3 Survey</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>