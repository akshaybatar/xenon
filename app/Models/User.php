<?php

namespace App\Models;
use PDO;


class User extends BaseModel
{
    private $table = 'users';
    public $name;
    public $id;
    public $password;
    public $email;

    public function register()
    {

        $query = "SELECT * FROM users WHERE email =:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;
        }


        $query = "INSERT INTO users (name,email,password) VALUES(:name,:email,:password)";
        $stmt = $this->conn->prepare($query);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        $query = "SELECT * FROM users WHERE email =:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row && password_verify($this->password, $row['password'])) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            return true;
        } else {
            return false;
        }
    }
}
