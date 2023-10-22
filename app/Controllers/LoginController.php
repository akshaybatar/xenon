<?php

namespace App\Controllers;

use App\Models\User;

class LoginController
{

    public function index()
    {
        $user = new user;
        $data = $user->fetchSingle('SELECT * FROM users WHERE id=1');
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
        view('auth.login');
    }

    public function login()
    {

        $user = new User();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        if ($user->login()) {
            $_SESSION['id'] = $user->id;
            $_SESSION['name'] = $user->name;
            redirect('dashboard');
        } else {
            echo "Unable To Login";
        }
    }
}
