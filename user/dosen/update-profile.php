<?php
// include '../../config/Dabatse.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $id_dosen = $_POST['id_dosen'];

    // Update informasi profil
    if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $unit = $_POST['unit'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];

        $sql = "UPDATE p_dosen SET first_name=?, last_name=?, unit=?, email=?, phone_number=? WHERE id_dosen=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $first_name, $last_name, $unit, $email, $phone_number, $id_dosen);
        $stmt->execute();
    }

    // Update alamat
    if (isset($_POST['country']) && isset($_POST['city'])) {
        $country = $_POST['country'];
        $city = $_POST['city'];

        $sql = "UPDATE p_dosen SET country=?, city=? WHERE id_dosen=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $country, $city, $id_dosen);
        $stmt->execute();
    }

    // Handle file upload dan update URL gambar profil
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileType = $_FILES['profile_picture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = './uploaded_files/';
            $dest_path = $uploadFileDir . $newFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $sql = "UPDATE p_dosen SET picture=? WHERE id_dosen=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('si', $dest_path, $id_dosen);
                $stmt->execute();
            }
        }
    }
}
?>

