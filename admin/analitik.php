<?php
include 'data-analitik.php';
// include '../config/Database.php';
// include 'Analitik.php'; // Include file class Analitik

$database = new Database();
$db = $database->getConnection();

$analitik = new Analitik($db);

$total_soal = $analitik->getTotalSoal();
$total_survey = $analitik->getTotalSurvey();
$total_jawaban = $analitik->getTotalJawaban();
$jumlah_responden = $analitik->getJumlahResponden();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analitik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styleDashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .filter-container {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-tag {
            display: flex;
            align-items: center;
            background-color: #e0e0e0;
            border-radius: 12px;
            padding: 5px 10px;
            font-size: 14px;
        }

        .filter-tag span {
            margin-right: 8px;
        }

        .filter-tag button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            line-height: 1;
        }

        .filter-add {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            border: 1px dashed #6c757d;
            border-radius: 12px;
            cursor: pointer;
            font-size: 14px;
            background-color: white;
        }

        .chart-container {
            display: flex;
            justify-content: space-between;
        }

        .chart-card {
            flex: 1;
            margin: 0 10px;
        }

        .chart-card .card {
            height: 100%;
        }

        .full-width-chart {
            flex: 1;
            min-width: 0;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" style="height: 160vh;">
            <div class="d-flex flex-direction-column justify-content-center align-items-center mt-2">
                <button id="toggle-btn" type="button">
                    <img src="../assets/images/logo-polinema.png" alt="logo" class="rounded-circle ms-xl-1" width="50px">
                </button>
                <div class="sidebar-logo">
                    <span class="fw-bold">Survey.<span style="color: #03045E;">Ku</span></span>
                    <span class="campus d-block fw-semibold">POLITEKNIK NEGERI MALANG</span>
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
                    <a href="../admin/umpan-balik.php" class="sidebar-link">
                        <img src="../assets/icon/Feedback.png" alt="icon-feedback" width="18px">
                        <span>Umpan Balik</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../admin/analitik.php" class="sidebar-link bg-white rounded-3">
                        <img src="../assets/icon/Analytics.png" alt="icon-analytics" width="18px">
                        <span>Analitik</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../logout.php" class="sidebar-footer-link">
                    <img src="../assets/icon/Logout.png" alt="icon-logout" width="18px">
                    <span>Log out</span>
                </a>
            </div>
        </aside>

        <div class="main">
            <div class="header d-flex justify-content-between ms-5 mt-4 mb-4 me-4">
                <div class="header-info">
                    <h1 class="fw-bold">
                        Analitik
                    </h1>
                    <p class="desc mb-2">Wawasan berbasis data menginformasikan keputusan dan meningkatkan hasil</p>
                </div>
                <div class="group-button">
                    <button class="btn btn-light border-black pe-3 ps-3">Export</button>
                    <button class="btn btn-primary pe-4 ps-4 ms-3">Generate Report</button>
                </div>
            </div>
            <div class="content ms-5 me-5 mb-5">
                <div class="statistics mb-5">
                    <div class="container mt-3">
                        <div class="filter-container" id="filter-container">
                            <div class="filter-tag" style="display: none;" id="filter-template">
                                <span class="filter-text"></span>
                                <button type="button" class="remove-filter" aria-label="Remove filter">×</button>
                            </div>
                        </div>
                    </div>
                    <div class="group-cards d-flex align-items-baseline gap-4 mt-4">
                        <div class="card" style="width: 294px; height: 144px; border-radius: 12px">
                            <div class="card-body d-flex flex-column-reverse">
                                <h5 class="card-title fw-semibold mt-1"><?php echo $total_soal; ?></h5>
                                <p class="card-text">Soal</p>
                            </div>
                        </div>
                        <div class="card" style="width: 294px; height: 144px; border-radius: 12px">
                            <div class="card-body d-flex flex-column-reverse">
                                <h5 class="card-title fw-semibold mt-1"><?php echo $total_survey; ?></h5>
                                <p class="card-text">Survey</p>
                            </div>
                        </div>
                        <div class="card" style="width: 294px; height: 144px; border-radius: 12px">
                            <div class="card-body d-flex flex-column-reverse">
                                <h5 class="card-title fw-semibold mt-1"><?php echo $total_jawaban; ?></h5>
                                <p class="card-text">Jawaban</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grafik">
                    <section class="py-3 py-md-5">
                        <div class="container">
                            <div class="row chart-container">
                                <div class="chart-card full-width-chart">
                                    <div class="card widget-card border-light shadow-sm mb-5">
                                        <div class="card-body p-4">
                                            <div class="d-block d-sm-flex align-items-center justify-content-between mb-3">
                                                <div class="mb-3 mb-sm-0">
                                                    <h5 class="card-title widget-card-title">Jumlah Responden</h5>
                                                </div>
                                            </div>
                                            <div id="bsb-chart-4"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-card" style="height: 400px;">
                                    <div class="card widget-card border-light shadow-sm mb-5">
                                        <div class="card-body p-4">
                                            <div class="d-block d-sm-flex align-items-center justify-content-between mb-3">
                                                <div class="mb-3 mb-sm-0">
                                                    <h5 class="card-title widget-card-title">Jumlah Sesi</h5>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="surveyChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Add Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Stakeholder</h6>
                        <div class="list-group mb-3">
                            <button type="button" class="list-group-item list-group-item-action filter-option">Mahasiswa</button>
                            <button type="button" class="list-group-item list-group-item-action filter-option">Orang Tua</button>
                            <button type="button" class="list-group-item list-group-item-action filter-option">Industri</button>
                            <button type="button" class="list-group-item list-group-item-action filter-option">Tendik</button>
                            <button type="button" class="list-group-item list-group-item-action filter-option">Alumni</button>
                            <button type="button" class="list-group-item list-group-item-action filter-option">Dosen</button>
                        </div>
                        <h6>Jenis Survey</h6>
                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action filter-option">Fasilitas</button>
                            <button type="button" class="list-group-item list-group-item-action filter-option">Proses Administrasi</button>
                            <button type="button" class="list-group-item list-group-item-action filter-option">Kualitas Pengajaran</button>
                            <!-- Add more survey types as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // const filterContainer = document.getElementById('filter-container');
                // const filterTemplate = document.getElementById('filter-template');

                // document.querySelectorAll('.filter-option').forEach(option => {
                //     option.addEventListener('click', () => {
                //         const filterText = option.textContent.trim();
                //         addFilter(filterText);
                //         const modal = bootstrap.Modal.getInstance(document.getElementById('filterModal'));
                //         modal.hide();
                //     });
                // });

                // filterContainer.addEventListener('click', (event) => {
                //     if (event.target.classList.contains('remove-filter')) {
                //         event.target.parentElement.remove();
                //     }
                // });

                // function addFilter(text) {
                //     const newFilter = filterTemplate.cloneNode(true);
                //     newFilter.style.display = 'flex';
                //     newFilter.querySelector('.filter-text').textContent = text;
                //     filterContainer.insertBefore(newFilter, filterContainer.querySelector('.filter-add'));
                // }

                // Data responden dan jumlahnya
                // const respondenData =;
                // const series = Object.values(respondenData);
                // const labels = Object.keys(respondenData);


                // Data responden dan jumlahnya dari PHP
                const respondenData = <?php echo json_encode(array_values($jumlah_responden)); ?>;
                const labels = <?php echo json_encode(array_keys($jumlah_responden)); ?>;

                // const series = respondenData;
                console.log(respondenData); // Debug: Check if data is correctly passed
                console.log(labels); // Debug: Check if labels are correctly passed


                // Warna untuk setiap segmen di donut chart
                const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];



                // const respondenData = [
                //     {responden: "Mahasiswa", jumlah: 120},
                //     {responden: "Dosen", jumlah: 150},
                //     {responden: "Alumni", jumlah: 80},
                //     {responden: "Wali Mahasiswa", jumlah: 60},
                //     {responden: "Industri", jumlah: 110},
                //     {responden: "Tenaga Kependidikan", jumlah: 90}
                // ];

                // Format data untuk ApexCharts
                // const series = respondenData.map(item => item.jumlah);
                // const labels = respondenData.map(item => item.responden);

                // Options untuk ApexCharts
                // const options = {
                //     chart: {
                //         type: 'donut'
                //     },
                //     series: respondenData,
                //     labels: labels,
                //     colors: colors,
                //     responsive: [{
                //         breakpoint: 480,
                //         options: {
                //             chart: {
                //                 width: 200
                //             },
                //             legend: {
                //                 position: 'bottom'
                //             }
                //         }
                //     }],
                //     plotOptions: {
                //         pie: {
                //             donut: {
                //                 size: '65%'
                //             }
                //         }
                //     }
                // };


                // Options untuk ApexCharts
                const options = {
                    chart: {
                        type: 'donut'
                    },
                    series: respondenData,
                    labels: labels,
                    colors: colors,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%'
                            }
                        }
                    },
                    legend: {
                        show: true,
                        position: 'right'
                    },
                    dataLabels: {
                        enabled: true
                    }
                };
                // Render chart
                const chart = new ApexCharts(document.querySelector("#bsb-chart-4"), options);
                chart.render();
            });
        </script>
    </body>
</html>
