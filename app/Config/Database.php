<?php

namespace App\Config;

use PDO;

class Database
{
     private $host = "localhost";
     private $db_name = "akshay";
     private $username = "root";
     private $password = "";
     public $conn;

     public function __construct()
     {
          $this->conn = null;
          try {
               $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
               $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               // echo "Connected successfully";
          } catch (PDOException $e) {
               echo "Connection failed: " . $e->getMessage();
          }
     }

     public function fetchdata($query, $params = [])
     {

          try {
               $stmt = $this->conn->prepare($query);
               $stmt->execute();
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
          } catch (PDOException $th) {
               return $th->getMessage();
          }
     }

     public function fetchSingle($query)
     {

          $stmt = $this->conn->query($query);
         
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }
}
