<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LogoutAdminController extends Controller
{
    public function logoutAdmin()
    {
        // Détruire la session de l'utilisateur
        session()->destroy();

        // Ajouter un message de déconnexion réussi à la session
        session()->setFlashdata('success', 'Vous êtes déconnecté avec succès.');

        // Rediriger l'utilisateur vers la page d'accueil (index)
        return redirect()->to(base_url('/'));
    }
}
