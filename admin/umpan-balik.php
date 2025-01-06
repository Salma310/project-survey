<?php
session_start();
require_once '../config/Database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/styleDashboard.css">
    <style>
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .feedback-card {
            margin-bottom: 20px;
            border: 1px solid #e6e6e6;
            border-radius: 12px;
        }
        .feedback-card .card-body {
            padding: 20px;
        }
        .nav-tabs .nav-link {
            font-size: 14px;
            color: black;
            position: relative;
            transition: color 0.3s;
        }
        .nav-tabs .nav-link.active {
            color: black;
            border: none !important;
            font-weight: 700;
        }
        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -5px;
            transform: translateX(-50%);
            width: 30%;
            height: 3px;
            background-color: #0085FF;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" style="height: 170vh;">
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
                    <a href="../admin/dashboard-admin.php" class="sidebar-link mb-3">
                        <img src="../assets/icon/Home.png" alt="icon-overview" width="18px">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item mb-3">
                    <a href="../admin/survey.php" class="sidebar-link">
                    <img src="../assets/icon/logo-survey.png" alt="icon-workspace" width="18px">
                        <span>Survey</span>
                    </a>
                </li>
                <li class="sidebar-item mb-3">
                    <a href="../admin/umpan-balik.php" class="sidebar-link bg-white rounded-3">
                        <img src="../assets/icon/Feedback.png" alt="icon-feedback" width="18px">
                        <span>Umpan Balik</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../admin/analitik.php" class="sidebar-link">
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
                        Ranking
                    </h1>
                    <p class="desc mb-3">Perankingan Kriteria menurut stakeholder</p>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#" id="allFeedbackTab">Semua Ranking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="mahasiswaFeedbackTab">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="dosenFeedbackTab">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="tendikFeedbackTab">Tenaga Kependidikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="industriFeedbackTab">Industri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="alumniFeedbackTab">Alumni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="ortuFeedbackTab">Orang tua</a>
                </li>
            </ul>
            
            <!-- MAHASISWA -->
            <div class="container mt-4 mb-4">
                <div class="tab-content active"id="mahasiswaFeedbackContent">
                    <div class="table-responsive border border-secondary-subtle rounded-2" style="width: 610px; height:580px;">
                        <table class="table  table-borderless align-middle text-center rounded-1" style="width: 100%; font-size: 15px;">
                            <thead>
                                <tr class="border-bottom">
                                    <th scope="col" style="width: 5%;">Rank</th>
                                    <th scope="col" style="width: 50%;">Nama Survey</th>
                                    <th scope="col" style="width: 25%;">Total Skor</th>
                                    <th scope="col" style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Fasilitas Kampus</td>
                                    <td>0.945</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Kualitas Pengajaran</td>
                                    <td>0.875</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Layanan Mahasiswa</td>
                                    <td>0.825</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Proses Administrasi</td>
                                    <td>0.795</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- DOSEN -->
            <div class="container mt-4 mb-4">
                <div class="tab-content active"id="dosenFeedbackContent">
                    <div class="table-responsive border border-secondary-subtle rounded-2" style="width: 610px; height:580px;">
                        <table class="table  table-borderless align-middle text-center rounded-1" style="width: 100%; font-size: 15px;">
                            <thead>
                                <tr class="border-bottom">
                                    <th scope="col" style="width: 5%;">Rank</th>
                                    <th scope="col" style="width: 50%;">Nama Survey</th>
                                    <th scope="col" style="width: 25%;">Total Skor</th>
                                    <th scope="col" style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Fasilitas Kampus</td>
                                    <td>0.945</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Kualitas Pengajaran</td>
                                    <td>0.875</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Layanan Mahasiswa</td>
                                    <td>0.825</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Proses Administrasi</td>
                                    <td>0.795</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TENDIK -->
            <div class="container mt-4 mb-4">
                <div class="tab-content active" id="tendikFeedbackContent">
                    <div class="table-responsive border border-secondary-subtle rounded-2" style="width: 610px; height:580px;">
                        <table class="table  table-borderless align-middle text-center rounded-1" style="width: 100%; font-size: 15px;">
                            <thead>
                                <tr class="border-bottom">
                                    <th scope="col" style="width: 5%;">Rank</th>
                                    <th scope="col" style="width: 50%;">Nama Survey</th>
                                    <th scope="col" style="width: 25%;">Total Skor</th>
                                    <th scope="col" style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Fasilitas Kampus</td>
                                    <td>0.945</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Kualitas Pengajaran</td>
                                    <td>0.875</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Layanan Mahasiswa</td>
                                    <td>0.825</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Proses Administrasi</td>
                                    <td>0.795</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- INDUSTRI -->
            <div class="container mt-4 mb-4">
                <div class="tab-content active" id="industriFeedbackContent">
                    <div class="table-responsive border border-secondary-subtle rounded-2" style="width: 610px; height:580px;">
                        <table class="table  table-borderless align-middle text-center rounded-1" style="width: 100%; font-size: 15px;">
                            <thead>
                                <tr class="border-bottom">
                                    <th scope="col" style="width: 5%;">Rank</th>
                                    <th scope="col" style="width: 50%;">Nama Survey</th>
                                    <th scope="col" style="width: 25%;">Total Skor</th>
                                    <th scope="col" style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Fasilitas Kampus</td>
                                    <td>0.945</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Kualitas Pengajaran</td>
                                    <td>0.875</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Layanan Mahasiswa</td>
                                    <td>0.825</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Proses Administrasi</td>
                                    <td>0.795</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            <!-- ALUMNI -->
            <div class="container mt-4 mb-4">
                <div class="tab-content active" id="alumniFeedbackContent">
                    <div class="table-responsive border border-secondary-subtle rounded-2" style="width: 610px; height:580px;">
                        <table class="table  table-borderless align-middle text-center rounded-1" style="width: 100%; font-size: 15px;">
                            <thead>
                                <tr class="border-bottom">
                                    <th scope="col" style="width: 5%;">Rank</th>
                                    <th scope="col" style="width: 50%;">Nama Survey</th>
                                    <th scope="col" style="width: 25%;">Total Skor</th>
                                    <th scope="col" style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Fasilitas Kampus</td>
                                    <td>0.945</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Kualitas Pengajaran</td>
                                    <td>0.875</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Layanan Mahasiswa</td>
                                    <td>0.825</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Proses Administrasi</td>
                                    <td>0.795</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ORTU -->
            <div class="container mt-4 mb-4">
                <div class="tab-content active" id="ortuFeedbackContent">
                    <div class="table-responsive border border-secondary-subtle rounded-2" style="width: 610px; height:580px;">
                        <table class="table  table-borderless align-middle text-center rounded-1" style="width: 100%; font-size: 15px;">
                            <thead>
                                <tr class="border-bottom">
                                    <th scope="col" style="width: 5%;">Rank</th>
                                    <th scope="col" style="width: 50%;">Nama Survey</th>
                                    <th scope="col" style="width: 25%;">Total Skor</th>
                                    <th scope="col" style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Fasilitas Kampus</td>
                                    <td>0.945</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Kualitas Pengajaran</td>
                                    <td>0.875</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Layanan Mahasiswa</td>
                                    <td>0.825</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Proses Administrasi</td>
                                    <td>0.795</td>
                                    <td><button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="container mt-4">
                <div class="tab-content active" id="allFeedbackContent">
                    <div class="feedback-card card">
                        <div class="card-body">
                            <span class="badge text-success px-2 py-1 mb-5" style="background-color: rgba(12.87, 160.89, 0, 0.25);">Positif</span>
                            <h5 class="card-title d-inline">Sangat Baik</h5>
                            <div class="d-flex justify-content-between mt-3">
                            <div class="category1">
                                    <p class="fw-light">Positif:</p>
                                    <i class="lni lni-checkmark-circle mb-4"></i>
                                    <p class="d-inline fw-semibold">Suasana yang baik</p>
                                </div>
                                <div class="category2">
                                    <p class="fw-light">Netral:</p>
                                    <i class="lni lni-circle-minus mb-4"></i>
                                    <p class="d-inline fw-semibold">Bisa lebih baik lagi</p>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="mb-0 me-0 mt-1">Anonymous</p>
                            </div>
                        </div>
                    </div>

                    <div class="feedback-card card">
                        <div class="card-body">
                            <span class="badge text-danger px-2 py-1 mb-5" style="background-color: rgba(251, 24, 24, 0.25);">Negatif</span>
                            <h5 class="card-title mb-5 d-inline">Sangat Buruk</h5>
                            <div class="d-flex justify-content-between mt-3">
                            <div class="category1">
                                    <p class="fw-light">Netral:</p>
                                    <i class="lni lni-checkmark-circle mb-4"></i>
                                    <p class="d-inline fw-semibold">Bisa lebih baik lagi</p>
                                </div>
                                <div class="category2">
                                    <p class="fw-light">Negatif:</p>
                                    <i class="lni lni-cross-circle mb-4"></i>
                                    <p class="d-inline fw-semibold">Rata-rata pemanfaatan waktu</p>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="mb-0 me-0 mt-1">Anonymous</p>
                            </div>
                        </div>
                    </div>

                    <div class="feedback-card card">
                        <div class="card-body">
                            <span class="badge text-secondary px-2 py-1 mb-5" style="background-color: rgba(112, 112, 112, 0.25);">Positif</span>
                            <h5 class="card-title mb-5 d-inline">Cukup</h5>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="category1">
                                    <p class="fw-light">Positif:</p>
                                    <i class="lni lni-checkmark-circle mb-4"></i>
                                    <p class="d-inline fw-semibold">Suasana yang baik</p>
                                </div>
                                <div class="category2">
                                    <p class="fw-light">Netral:</p>
                                    <i class="lni lni-circle-minus mb-4"></i>
                                    <p class="d-inline fw-semibold">Bisa lebih baik lagi</p>
                                </div>
                                <div class="category3">
                                    <p class="fw-light">Negatif:</p>
                                    <i class="lni lni-cross-circle mb-4"></i>
                                    <p class="d-inline fw-semibold">Rata-rata pemanfaatan waktu</p>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="mb-0 me-0 mt-1">Anonymous</p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="tab-content" id="mahasiswaFeedbackContent">
                    <p>Tidak ada umpan balik dari Mahasiswa.</p>
                </div>
                <div class="tab-content" id="dosenFeedbackContent">
                    <p>Tidak ada umpan balik dari Dosen.</p>
                </div>
                <div class="tab-content" id="tendikFeedbackContent">
                    <p>Tidak ada umpan balik dari Tenaga Kependidikan.</p>
                </div>
                <div class="tab-content" id="industriFeedbackContent">
                    <p>Tidak ada umpan balik dari Industri.</p>
                </div>
                <div class="tab-content" id="alumniFeedbackContent">
                    <p>Tidak ada umpan balik dari Alumni.</p>
                </div>
                <div class="tab-content" id="ortuFeedbackContent">
                    <p>Tidak ada umpan balik dari Orang tua.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/script.js"></script>
    <script>
        document.getElementById('allFeedbackTab').addEventListener('click', function() {
            showTabContent('allFeedbackContent', 'allFeedbackTab');
        });

        document.getElementById('mahasiswaFeedbackTab').addEventListener('click', function() {
            showTabContent('mahasiswaFeedbackContent', 'mahasiswaFeedbackTab');
        });

        document.getElementById('dosenFeedbackTab').addEventListener('click', function() {
            showTabContent('dosenFeedbackContent', 'dosenFeedbackTab');
        });

        document.getElementById('tendikFeedbackTab').addEventListener('click', function() {
            showTabContent('tendikFeedbackContent', 'tendikFeedbackTab');
        });

        document.getElementById('industriFeedbackTab').addEventListener('click', function() {
            showTabContent('industriFeedbackContent', 'industriFeedbackTab');
        });

        document.getElementById('alumniFeedbackTab').addEventListener('click', function() {
            showTabContent('alumniFeedbackContent', 'alumniFeedbackTab');
        });

        document.getElementById('ortuFeedbackTab').addEventListener('click', function() {
            showTabContent('ortuFeedbackContent', 'ortuFeedbackTab');
        });

        function showTabContent(contentId, tabId) {
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.remove('active'));

            const tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(tab => tab.classList.remove('active'));

            document.getElementById(contentId).classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }
    </script>
</body>
</html>
