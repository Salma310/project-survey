<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/../project-survey/css/styleProfile.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" style="height: 150vh;">
            <div class="d-flex flex-direction-column justify-content-center align-items-center mt-2">
                <button id="toggle-btn" type="button">
                    <img src="/../project-survey/assets/images/logo-polinema.png" alt="logo" class="rounded-circle ms-xl-1" width="50px">
                </button>
                <div class="sidebar-logo">
                    <span class="fw-bold">Survey.<span style="color: #03045E;">Ku</span></span>
                    <span class=" campus d-block fw-semibold">POLITEKNIK NEGERI MALANG</span>
                </div>
            </div>
            
            <ul class="sidebar-nav">
                <li class="sidebar- mb-3">
                    <a href="dashboard.php" class="sidebar-link">
                        <img src="/../project-survey/assets/icon/Home.png" alt="icon-overview" width="18px">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item mb-3">
                    <a href="survey.php" class="sidebar-link">
                        <img src="/../project-survey/assets/icon/logo-survey.png" alt="icon-workspace" width="18px">
                            <span>Survey</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../../public/logout.php" class="sidebar-footer-link">
                    <img src="/../project-survey/assets/icon/Logout.png" alt="icon-logout" width="18px">
                    <span>Log out</span>
                </a>
            </div>
        </aside>

        <div class="main">
            <div class="justify-content-center ms-4 mt-4 mb-4">
                <h1 class="fw-bold">
                    Profil Saya
                </h1>
            </div>
            <hr style="border: 2px solid #e6e6e6;">
            <div class="content">
                <div class="card border-black rounded-4 d-flex flex-row justify-content-center align-items-center mx-5 my-4 pt-lg-2 ps-4 pe-5">
                    <img src="/../project-survey/assets/images/photo-profile2.jpeg" alt="profile" class="rounded-circle me-xl-5 mb-2" width="98px" height="98px">
                    <div class="card-body d-flex flex-column justify-content-center text-start">
                        <h5 class="fw-semibold mb-3 mt-2">Victor Tarigan</h5>
                        <p class="fw-normal">Alumni</p>
                        <p class=" role fw-light">Alumni Politeknik Negeri Malang</p>
                    </div>
                    <div class="edit border border-black mb-5 extra-margin">
                        <i class="lni lni-pencil-alt"></i>
                    </div>
                </div>
                <div class="card rounded-4 border-black mx-5 my-4 ">
                    <div class="header d-flex flex-row justify-content-between p-4 pb-0">
                        <h5 class="fw-semibold">Informasi Pribadi</h5>
                        <div class="edit border border-black me-4" >
                            <i class="lni lni-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-4">
                                    <p class="identity mb-2">Nama Depan</p>
                                    <p class="fw-medium">Victor</p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Nama belakang</p>
                                    <p class="fw-medium">Tarigan</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-4">
                                    <p class="identity mb-2">Email</p>
                                    <p class="fw-medium">victor.tar@gmail.com</p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Nomor Handphone</p>
                                    <p class="fw-medium">0895 8097 7222</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="identity mb-2">Tahun Lulus</p>
                                    <p class="fw-medium">2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-4 border-black mx-5 my-4">
                    <div class="header d-flex flex-row justify-content-between p-4 pb-0">
                        <h5 class="fw-semibold">Alamat</h5>
                        <div class="edit border border-black me-4">
                            <i class="lni lni-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col-4">
                                    <p class="identity mb-2">Negara</p>
                                    <p class="fw-medium">Indonesia</p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Kota</p>
                                    <p class="fw-medium">Malang, Blimbing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-dialog modal-dialog-centered">
                
            </div>
        </div>
    </div>

    <script src="/../project-survey/js/script.js"></script>
</body>
</html>