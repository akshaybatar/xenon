<?php

namespace App\Middleware;

//Auth middleware
class Auth
{

    public function handle()
    {
        if (!isset($_SESSION['id'])) {
            redirect('login');
            exit();
        }
    }
}
