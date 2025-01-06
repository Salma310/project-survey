<?php
session_start();
require_once '../../config/Database.php';

date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan zona waktu Anda

// Membuat koneksi ke database
$database = new Database();
$conn = $database->getConnection();

// Ambil user_id dari session
if (!isset($_SESSION['user_id'])) {
    die("User ID tidak ditemukan dalam sesi.");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Memulai proses penyimpanan survei...<br>";

    $waktu_selesai = (new DateTime())->format('Y-m-d H:i:s'); // Ambil waktu sekarang sebagai waktu selesai
    $survey_tanggal = (new DateTime())->format('Y-m-d H:i:s');
    $survey_kategori_page = isset($_POST['survey_kategori_page']) ? $_POST['survey_kategori_page'] : null;


    if ( $survey_kategori_page === null) {
        die("kategori survey tidak ditemukan.");
    }

    // Tentukan survey_kategori_id berdasarkan asal halaman
    switch ($survey_kategori_page) {
        case 'soal-layanan-administrasi.php':
            $survey_kategori_id = 12;
            break;
        case 'soal-biaya-pendidikan.php':
            $survey_kategori_id = 13;
            break;
        default:
            die("Survey kategori tidak dikenal.");
    }

    // Masukkan data ke tabel m_survey
    $query_survey = "INSERT INTO m_survey (user_id, responden_id, survey_tanggal, waktu_selesai) VALUES ('$user_id', '1', '$survey_tanggal', '$waktu_selesai')";
    $result_survey = $conn->query($query_survey);

    if ($result_survey) {
        echo "Data survei berhasil dimasukkan ke m_survey!<br>";
        $survey_id = $conn->insert_id;

        // Loop melalui semua input yang diterima
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'pertanyaan') === 0) {
                // Ambil ID soal dari nama input
                $soal_id = str_replace('pertanyaan', '', $key);

                // Menangkap nilai jawaban yang dipilih
                $jawaban = $value;

                // Masukkan jawaban ke tabel t_jawaban_ortu
                $query_jawaban = "INSERT INTO t_jawaban_ortu (user_id, survey_id, survey_kategori_id, soal_id, jawaban) VALUES ('$user_id', '$survey_id', '$survey_kategori_id', '$soal_id', '$jawaban')";
                $result_jawaban = $conn->query($query_jawaban);

                if ($result_jawaban) {
                    echo "Jawaban untuk soal $soal_id berhasil dimasukkan ke t_jawaban_ortu!<br>";
                } else {
                    echo "Error dalam memasukkan jawaban untuk soal $soal_id: " . $conn->error . "<br>";
                }
            }
        }

        // Redirect ke halaman sukses atau halaman lain
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error dalam memasukkan data ke m_survey: " . $conn->error . "<br>";
    }

}


// session_start();
// require_once '../../config/Database.php';
// // Membuat koneksi ke database
// $database = new Database();
// $conn = $database->getConnection();

// // Ambil user_id dari session
// $user_id = $_SESSION['user_id'];

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Ambil waktu mulai, waktu selesai, dan kategori survey
//     $waktu_mulai = $_POST['waktu_mulai'];
//     $waktu_selesai = date('Y-m-d H:i:s'); // Ambil waktu sekarang sebagai waktu selesai
//     $survey_tanggal = date('Y-m-d H:i:s');
//     $survey_kategori_page = $_POST['survey_kategori_page'];

//     // Tentukan survey_kategori_id berdasarkan asal halaman
//     switch ($survey_kategori_page) {
//         case 'soal-kualitas-pengajaran.php':
//             $survey_kategori_id = 1;
//             break;
//         case 'soal-fasilitas-kampus.php':
//             $survey_kategori_id = 2;
//             break;
//         case 'soal-layanan-mahasiswa.php':
//             $survey_kategori_id = 3;
//             break;
//         case 'soal-proses-administrasi.php':
//             $survey_kategori_id = 4;
//             break;
//         default:
//             $survey_kategori_id = 0;
//             break;
//     }

//     // Masukkan data ke tabel m_survey
//     $stmt = $conn->prepare('INSERT INTO m_survey (user_id, survey_tanggal, waktu_mulai, waktu_selesai) VALUES (?, ?, ?, ?)');
//     $stmt->bind_param('isss', $user_id, $survey_tanggal, $waktu_mulai, $waktu_selesai);
//     $stmt->execute();
//     $survey_id = $stmt->insert_id;
//     $stmt->close();

//     // Loop melalui semua input yang diterima
//     foreach ($_POST as $key => $value) {
//         if (strpos($key, 'pertanyaan') === 0) {
//             // Ambil ID soal dari nama input
//             $soal_id = str_replace('pertanyaan', '', $key);

//             // Dapatkan nama pertanyaan berdasarkan soal_id
//             $stmt = $conn->prepare('SELECT pertanyaan FROM m_survey_soal WHERE soal_id = ?');
//             $stmt->bind_param('i', $soal_id);
//             $stmt->execute();
//             $stmt->bind_result($pertanyaan);
//             $stmt->fetch();
//             $stmt->close();

//             // Menangkap nilai jawaban yang dipilih
//             $jawaban = $_POST['pertanyaan' . $soal_id];

//             // Masukkan jawaban ke tabel t_jawaban_mahasiswa
//             $stmt = $conn->prepare('INSERT INTO t_jawaban_mahasiswa (user_id, survey_id, survey_kategori_id, soal_id, jawaban) VALUES (?, ?, ?, ?, ?)');
//             // Bind parameters to the prepared statement
//             $stmt->bind_param('iiiii', $user_id, $survey_id, $survey_kategori_id, $soal_id, $jawaban);
//             // Execute the prepared statement to insert the record
//             $stmt->execute();
//             // Close the prepared statement
//             $stmt->close();
//         }
//     }

//     // Redirect ke halaman sukses atau halaman lain
//     header('Location: dashboard.php');
//     exit();
// }


// session_start();
// require_once '../../config/Database.php';
// // Membuat koneksi ke database
// $database = new Database();
// $conn = $database->getConnection();

// // Ambil user_id dari session
// $user_id = $_SESSION['user_id'];


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Loop melalui semua input yang diterima
//     foreach ($_POST as $key => $value) {
//       if (strpos($key, 'pertanyaan') === 0) {
//         // Ambil ID soal dari nama input
//         $soal_id = str_replace('pertanyaan', '', $key);
  
//         // Dapatkan nama pertanyaan berdasarkan soal_id
//         $stmt = $conn->prepare('SELECT pertanyaan FROM m_survey_soal WHERE soal_id = ?');
//         $stmt->bind_param('i', $soal_id);
//         $stmt->execute();
//         $stmt->bind_result($pertanyaan);
//         $stmt->fetch();
//         $stmt->close();
  
//         // **Menangkap nilai jawaban yang dipilih**
//         $jawaban = $_POST['pertanyaan' . $soal_id];
  
//         // Insert answer into the t_jawaban_mahasiswa table
//         $stmt = $conn->prepare('INSERT INTO t_jawaban_mahasiswa (user_id, soal_id, jawaban) VALUES (?, ?, ?)');
  
//         // Bind parameters to the prepared statement
//         $stmt->bind_param('iii', $user_id, $soal_id, $jawaban);
  
   
//         // Execute the prepared statement to insert the record
//         $stmt->execute();
  
//         // Close the prepared statement
//         $stmt->close();
//       }

//     }
  
//     // Redirect ke halaman sukses atau halaman lain
//     header('Location: dashboard.php');
//     exit();
//   }

?>
