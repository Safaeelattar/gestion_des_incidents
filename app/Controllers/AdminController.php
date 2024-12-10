<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function login()
    {
        // Display the login form
        return view('admin_login');
    }

    public function authenticate()
    {
        // Get form input
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Hardcoded admin credentials
        $adminEmail = 'admin@gmail.com';
        $adminPassword = 'admin123';

        // Validate credentials
        if ($email === $adminEmail && $password === $adminPassword) {
            // Set admin session
            session()->set('isAdmin', true);
            return redirect()->to('dashboard')->with('success', 'Connexion réussie.');
        }

        // Invalid credentials
        return redirect()->back()->with('error', 'Identifiants incorrects.');
    }

    public function logout()
    {
        // Destroy admin session
        session()->remove('isAdmin');
        return redirect()->to('home')->with('success', 'Déconnexion réussie.');
    }
}