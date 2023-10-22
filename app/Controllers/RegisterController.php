<?php

namespace App\Controllers;

use App\Models\User;

class RegisterController
{

    public function index()
    {
        view('auth.register');
    }

    public function register()
    {

        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        if ($user->register()) {
            echo "User Register successfully!.";
        } else {
            echo "Unable To Register";
        }
    }
}
