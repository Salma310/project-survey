<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "pelanggan_survey";
    private $conn;

    public function __construct() {
        // Debug: Menampilkan pesan saat mencoba untuk terhubung ke database
        // echo "Mencoba terhubung ke database...<br>";
        
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        // Debug: Menampilkan pesan koneksi berhasil atau gagal
        // if ($this->conn->connect_error) {
        //     die("Koneksi gagal: " . $this->conn->connect_error);
        // } else {
        //     echo "Koneksi berhasil!<br>";
        // }
    }

    public function getConnection() {
        // Debug: Menampilkan pesan saat mengembalikan koneksi database
        // echo "Mengembalikan koneksi database...<br>";
        return $this->conn;
    }
}


// class Database {
//     private $host = "localhost";
//     private $user = "root";
//     private $password = "";
//     private $dbname = "pelanggan_survey";
//     public $conn;

//     public function __construct() {
//         // Debug: Menampilkan pesan saat mencoba untuk terhubung ke database
//         echo "Mencoba terhubung ke database...<br>";
        
//         $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

//         // Debug: Menampilkan pesan koneksi berhasil atau gagal
//         if ($this->conn->connect_error) {
//             die("Koneksi gagal: " . $this->conn->connect_error);
//         } else {
//             echo "Koneksi berhasil!<br>";
//         }
//     }

//     public function getConnection() {
//         // Debug: Menampilkan pesan saat mengembalikan koneksi database
//         echo "Mengembalikan koneksi database...<br>";
//         return $this->conn;
//     }
// }


// class Database {
//     private $host = "localhost";
//      private $db_name = "pelanggan_survey";
//      private $username = "root";
//      private $password = "";
//      public $conn;

//     public function __construct() {
//         $this->conn = new mysqli($this->host, $this->db_name, $this->username, $this->password);
//         if ($this->conn->connect_error) {
//             die("Connection failed: " . $this->conn->connect_error);
//             //debug
//              echo "Connected failed";
//         }
//     }

//     public function getConnection() {
//         return $this->conn;
//           //debug
//         echo "Connected successfully";
//     }





    //  public function getConnection() {
    //      $this->conn = null;
    //      try {
    //          $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    //          $this->conn->exec("set names utf8");
    //      } catch (PDOException $exception) {
    //          echo "Connection error: " . $exception->getMessage();
    //      }
    //      return $this->conn;
    //  }
?>  