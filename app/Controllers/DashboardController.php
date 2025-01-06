<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Periksa apakah pengguna sudah login
        if (session()->get('isLoggedIn')) {
            // Kirim data pengguna ke view
            return view('home', [
                'isLoggedIn' => true,
                'userName' => session()->get('name')
            ]);
        }
    
        // Jika belum login, tampilkan halaman biasa
        return view('home', ['isLoggedIn' => false]);
    }    
}
