<?php
session_start();
require_once '../../config/Database.php';

class Profile {
    private $conn;
    private $user_id;

    public function __construct($db, $user_id) {
        $this->conn = $db;
        $this->user_id = $user_id;
    }

    public function getProfileData() {
        $query = "SELECT first_name, last_name, phone_number, email, jenis_kelamin, pekerjaan, pendidikan, penghasilan, umur, id_mahasiswa, country, city FROM p_ortu WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }
}

// Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

// Dapatkan user_id dari sesi
$user_id = $_SESSION['user_id'];

// Buat objek Profile
$profile = new Profile($db, $user_id);

// Ambil data profil
$profileData = $profile->getProfileData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil Orang Tua</title>
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
                        <h5 class="fw-semibold mb-3 mt-2"><?php echo htmlspecialchars($profileData['first_name'] ?? ''); ?> <?php echo htmlspecialchars($profileData['last_name'] ?? ''); ?></h5>
                        <p class="fw-normal">Orang Tua</p>
                        <p class=" role fw-light">Orang Tua Mahasiswa</p>
                    </div>
                    <div class="edit border border-black mb-5 extra-margin" data-bs-toggle="modal" data-bs-target="#editnama">
                        <i class="lni lni-pencil-alt"></i>
                    </div>
                </div>
                <div class="card rounded-4 border-black mx-5 my-4 ">
                    <div class="header d-flex flex-row justify-content-between p-4 pb-0">
                        <h5 class="fw-semibold">Informasi Pribadi</h5>
                        <div class="edit border border-black me-4" data-bs-toggle="modal" data-bs-target="#editprofil">
                            <i class="lni lni-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-4">
                                    <p class="identity mb-2">Nama Depan</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['first_name'] ?? ''); ?></p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Nama belakang</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['last_name'] ?? ''); ?></p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Jenis Kelamin</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['jenis_kelamin'] ?? ''); ?></p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-4">
                                    <p class="identity mb-2">Pekerjaan</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['pekerjaan'] ?? ''); ?></p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Pendidikan</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['pendidikan'] ?? ''); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="identity mb-2">Umur</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['umur'] ?? ''); ?>Tahun</p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Penghasilan</p>
                                    <p class="fw-medium">Rp<?php echo htmlspecialchars($profileData['penghasilan'] ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-4 border-black mx-5 my-4">
                    <div class="header d-flex flex-row justify-content-between p-4 pb-0">
                        <h5 class="fw-semibold">Alamat</h5>
                        <div class="edit border border-black me-4" data-bs-toggle="modal" data-bs-target="#editalamat">
                            <i class="lni lni-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col-4">
                                    <p class="identity mb-2">Negara</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['country'] ?? ''); ?></p>
                                </div>
                                <div class="col-4">
                                    <p class="identity mb-2">Kota</p>
                                    <p class="fw-medium"><?php echo htmlspecialchars($profileData['city'] ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- Pop Up Edit -->
    <!-- MODAL EDIT Foto Profil, NIM, dan Password  -->
    <div class="modal fade" id="editnama" tabindex="-1" aria-labelledby="editpicture" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered ">
                <form action="" id="formEditPicture" class="ms-0">
                    <div class="modal-content">
                        <div class="modal-body d-flex justify-content-between gap-1">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <!-- <button type="button" id="upload-btn">
                                        <img src="../../assets/icon/camera.png" alt="edit" width="20px" height="20px">
                                    </button> -->
                                    <img src="../assets/icon/user.png" alt="profile_picture" width="250px" height="250px">
                                    <input type="file" id="file-input" name="profile_picture" accept="images/*">
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group position-relative mb-3">
                                        <label for="name" class="mb-1 text-secondary"><?php echo htmlspecialchars($profileData['first_name'] ?? ''); ?> <?php echo htmlspecialchars($profileData['last_name'] ?? ''); ?></label>
                                    </div>
                                    <div class="form-group position-relative mb-3">
                                        <label for="mahasiswa" class="mb-1 text-secondary">Orang Tua</label>
                                    </div>
                                    <div class="form-group position-relative mb-3">
                                        <label for="nim" class="mb-1 text-secondary">Orang Tua Mahasiswa</label>
                                        <!-- <input type="text" class="form-control border-0 border-bottom rounded-0" id="nim" value="<?php echo htmlspecialchars($profileData['nim'] ?? ''); ?>"> -->
                                    </div>
                                    <div class="form-group position-relative mb-3">
                                        <label for="gantipassword" class="mb-1 text-secondary" style="font-size: 12px;">Ganti Password</label>
                                        <input type="password" class="form-control border-0 border-bottom rounded-0 h-auto" id="password" style="font-size: 12px;">
                                    </div>
                                    <button type="submit" class="btn btn-white border-black rounded mt-4" style="float: right;">Simpan</button>                
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
        <!-- EDIT Profil Utama  -->
        <div class="modal fade" id="editprofil" tabindex="-1" aria-labelledby="editprofil" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editprofil">Informasi Pribadi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formEditProfil" enctype="multipart/form-data">
                        <div class="form-group position-relative mb-3">
                            <label for="firstname" class="mb-1 text-secondary">Nama Depan</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="firstname" value="<?php echo htmlspecialchars($profileData['first_name'] ?? ''); ?>">
                        </div>
                        <div class="form-group position-relative mb-3">
                            <label for="lastname" class="mb-1 text-secondary">Nama Belakang</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="lastname" value="<?php echo htmlspecialchars($profileData['last_name'] ?? ''); ?>">
                        </div>
                        <div class="form-group position-relative mb-3">
                            <label for="gender" class="mb-1 text-secondary">Jenis Kelamin</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="gender" value="<?php echo htmlspecialchars($profileData['gender'] ?? ''); ?>">
                        </div>
                        <div class="form-group position-relative mb-3">
                            <label for="tahun_masuk" class="mb-1 text-secondary">Pekerjaan</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="pekerjaan" value="<?php echo htmlspecialchars($profileData['pekerjaan'] ?? ''); ?>">
                        </div>
                        <div class="form-group position-relative mb-3">
                            <label for="email" class="mb-1 text-secondary">Pendidikan</label>
                            <input type="email" class="form-control border-0 border-bottom rounded-0" id="pendidikan" value="<?php echo htmlspecialchars($profileData['pendidikan'] ?? ''); ?>">
                        </div>
                        <div class="form-group position-relative mb-3">
                            <label for="prodi" class="mb-1 text-secondary">Umur</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="umur" value="<?php echo htmlspecialchars($profileData['umur'] ?? ''); ?>">
                        </div>
                        <div class="form-group position-relative mb-3">
                            <label for="phone_number" class="mb-1 text-secondary">Penghasilan</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="penghasilan" value="<?php echo htmlspecialchars($profileData['penghasilan'] ?? ''); ?>">
                        </div>
                        <button type="submit" class="btn btn-white border-black rounded mt-4" style="float: right;" >Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- EDIT alamat  -->
        <div class="modal fade" id="editAlamat" tabindex="-1" aria-labelledby="editalamat" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editprofil">Alamat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formEditAlamat">
                        <div class="form-group position-relative mb-3">
                            <label for="firstname" class="mb-1 text-secondary">Negara</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="firstname" value="<?php echo htmlspecialchars($profileData['country'] ?? ''); ?>">
                        </div>
                        <div class="form-group position-relative mb-3">
                            <label for="lastname" class="mb-1 text-secondary">Kota</label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0" id="lastname" value="<?php echo htmlspecialchars($profileData['city'] ?? ''); ?>">
                        </div>
                        <button type="submit" class="btn btn-white border-black rounded mt-4" style="float: right;">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="/../project-survey/js/script.js"></script>
</body>
</html>