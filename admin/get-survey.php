<?php
class Survey {
    private $conn;
    private $table_name = "m_survey_kategori";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function countSurveysByCategory($responden_id) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table_name . " WHERE responden_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['count'];
    }
    
    public function getSurveysForMahasiswa() {
        $query = "SELECT survey_kategori_id, survey_judul, background_pic FROM " . $this->table_name . " WHERE responden_id = 1";
        $result = $this->conn->query($query);
        
        if (!$result) {
            die("Query gagal: " . $this->conn->error);
        }
        
        return $result;
    }

    public function getSurveysForDosen() {
        $query = "SELECT survey_kategori_id, survey_judul, background_pic FROM " . $this->table_name . " WHERE responden_id = 2";
        $result = $this->conn->query($query);
        
        if (!$result) {
            die("Query gagal: " . $this->conn->error);
        }
        
        return $result;
    }

    public function getSurveysForAlumni() {
        $query = "SELECT survey_kategori_id, survey_judul, background_pic FROM " . $this->table_name . " WHERE responden_id = 3";
        $result = $this->conn->query($query);
        
        if (!$result) {
            die("Query gagal: " . $this->conn->error);
        }
        
        return $result;
    }

    public function getSurveysForWaliMhs() {
        $query = "SELECT survey_kategori_id, survey_judul, background_pic FROM " . $this->table_name . " WHERE responden_id = 4";
        $result = $this->conn->query($query);
        
        if (!$result) {
            die("Query gagal: " . $this->conn->error);
        }
        
        return $result;
    }

    public function getSurveysForIndustri() {
        $query = "SELECT survey_kategori_id, survey_judul, background_pic FROM " . $this->table_name . " WHERE responden_id = 5";
        $result = $this->conn->query($query);
        
        if (!$result) {
            die("Query gagal: " . $this->conn->error);
        }
        
        return $result;
    }

    public function getSurveysForTendik() {
        $query = "SELECT survey_kategori_id, survey_judul, background_pic FROM " . $this->table_name . " WHERE responden_id = 6";
        $result = $this->conn->query($query);
        
        if (!$result) {
            die("Query gagal: " . $this->conn->error);
        }
        
        return $result;
    }

    

}

?>
