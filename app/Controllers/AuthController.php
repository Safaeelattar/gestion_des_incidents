<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    // Affiche la vue de connexion
    public function login()
    {
        return view('login');
    }

    // Gère l'authentification de l'utilisateur
    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();

        // Récupérer les données du formulaire
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Vérifier si l'utilisateur existe dans la base de données
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // Vérifier si le mot de passe est correct
            if (password_verify($password, $user['password'])) {
                // Créer une session utilisateur
                $sessionData = [
                    'user_id' => $user['id'],
                    'full_name' => $user['full_name'],
                    'email' => $user['email'],
                    'logged_in' => true,
                ];
                $session->set($sessionData);

                // Rediriger vers la page d'accueil ou tableau de bord
                return redirect()->to('/form');
            } else {
                // Mot de passe incorrect
                $session->setFlashdata('error', 'Mot de passe incorrect.');
                return redirect()->to('/login');
            }
        } else {
            // Utilisateur non trouvé
            $session->setFlashdata('error', "Cet email n'est pas enregistré.");
            return redirect()->to('/login');
        }
    }

    // Déconnecte l'utilisateur
    public function logout()
    {
        $session = session();
        $session->destroy(); // Détruit la session
        return redirect()->to('/');
    }
}
