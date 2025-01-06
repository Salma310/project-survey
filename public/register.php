<?php 
require_once '../config/Database.php';

class Register {
    private $conn;
    private $role;
    private $first_name;
    private $last_name;
    private $email;
    private $username;
    private $password;
    private $phone_number;
    private $city;
    private $country;

    public function __construct($db) {
        $this->conn = $db->getConnection();
    }

    public function setData($data) {
        $this->role = $data['role'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->phone_number = $data['phone_number'];
        $this->city = $data['city'];
        $this->country = $data['country'];
    }

    public function registerUser() {
        echo "Memulai proses registrasi...<br>";
        $query_user = "INSERT INTO m_user (username, password, role) VALUES ('$this->username', '$this->password', '$this->role')";
        $result_user = $this->conn->query($query_user);

        if ($result_user) {
            echo "User berhasil dimasukkan ke m_user!<br>";
            $user_id = $this->conn->insert_id;

            $query_role = "";
            switch ($this->role) {
                case 'mahasiswa':
                    $query_role = "INSERT INTO p_mahasiswa (user_id, first_name, last_name, email, phone_number, city, country) VALUES ('$user_id', '$this->first_name', '$this->last_name', '$this->email', '$this->phone_number', '$this->city', '$this->country')";
                    break;
                case 'dosen':
                    $query_role = "INSERT INTO p_dosen (user_id, first_name, last_name, email, phone_number, city, country) VALUES ('$user_id', '$this->first_name', '$this->last_name', '$this->email', '$this->phone_number', '$this->city', '$this->country')";
                    break;
                case 'tendik':
                    $query_role = "INSERT INTO p_tendik (user_id, first_name, last_name, email, phone_number, city, country) VALUES ('$user_id', '$this->first_name', '$this->last_name', '$this->email', '$this->phone_number', '$this->city', '$this->country')";
                    break;
                case 'ortu':
                    $query_role = "INSERT INTO p_ortu (user_id, first_name, last_name, email, phone_number, city, country) VALUES ('$user_id', '$this->first_name', '$this->last_name', '$this->email', '$this->phone_number', '$this->city', '$this->country')";
                    break;
                case 'alumni':
                    $query_role = "INSERT INTO p_alumni (user_id, first_name, last_name, email, phone_number, city, country) VALUES ('$user_id', '$this->first_name', '$this->last_name', '$this->email', '$this->phone_number', '$this->city', '$this->country')";
                    break;
                case 'industri':
                    $query_role = "INSERT INTO p_industri (user_id, first_name, last_name, email, phone_number, city, country) VALUES ('$user_id', '$this->first_name', '$this->last_name', '$this->email', '$this->phone_number', '$this->city', '$this->country')";
                    break;
                default:
                    echo "Role tidak dikenal!<br>";
                    return false;
            }

            $result_role = $this->conn->query($query_role);
            if ($result_role) {
                echo "Data berhasil dimasukkan ke tabel $this->role!<br>";
                return true;
            } else {
                echo "Error dalam memasukkan data ke tabel $this->role: " . $this->conn->error . "<br>";
                return false;
            }
        } else {
            echo "Error dalam memasukkan data ke m_user: " . $this->conn->error . "<br>";
            return false;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $register = new Register($database);
    $register->setData($_POST);
}

    //  Jika pendaftaran berhasil
//     if ($registrasi_berhasil) {
//         echo '<script>alert("Selamat, pendaftaran Anda berhasil!");</script>';
//         echo '<script>window.location.href = "login.php";</script>';
//         exit(); // Redirect ke halaman login
//     } else {
//         $error_message = "Pendaftaran gagal. Silakan ulangi pendaftaran.";
//     }

//     if ($register->registerUser()) {
//         echo "Registrasi berhasil!";
//     } else {
//         echo "Registrasi gagal!";
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="../css/styleRegist.css">
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="../assets/images/polinema.reg.png" alt="Gambar">
        </div>
        <div class="form-container">
            <form method="post" class="form" >
                <header>Registration Form</header>
                    <div class="input-box">
                        <div class="select-box">
                            <select id="role" name="role">
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="tendik">Tenaga Kependidikan</option>
                            <option value="industri">Industri</option>
                            <option value="alumni">Alumni</option>
                            <option value="ortu">Orang Tua</option>
                            </select>
                        </div>
                    </div>
                    <div class="column">
                        <div class="input-box">
                          <input name="first_name" type="text" placeholder="First Name" required />
                        </div>
                        <div class="input-box">
                          <input name="last_name" type="text" placeholder="Last Name" required />
                        </div>
                    </div>
                    <div class="input-box">
                        <input name="email" type="email" placeholder="Email Address" required />
                      </div>
                      <div class="column">
                        <div class="input-box">
                          <input name="username" type="text" placeholder="Username" required />
                        </div>
                        <div class="input-box">
                          <input name="password" type="password" placeholder="Password" required />
                        </div>
                      </div>
                      <div class="input-box">
                          <input name="phone_number" type="number" placeholder="Phone Number" required />
                      </div>
                      <div class="column">
                        <div class="input-box">
                          <input name="city" type="text" placeholder="City" required />
                        </div>
                        <div class="input-box">
                          <input name="country" type="text" placeholder="Country" required />
                        </div>
                    </div> 

                    <?php
                    // if (isset($error_message)) {
                    //     echo '<div class="error-message">' . $error_message . '</div>';
                    // }
                    ?>

                <button type="submit" name="register" class="btn btn-success">Register</button>
                <?php
                if (!isset($error_message)) {
                    echo '<div class="login-link">Already have an account?  <a href="login.php">Login here</a></div>';
                }
                ?>
            </form>
            <!-- Notifikasi -->
            <?php
            // if (isset($notifikasi)) {
            //     echo '<div class="notification">' . $notifikasi . '</div>';
            // }
            ?>
            
        </div>
    </div>
</body>
</html>