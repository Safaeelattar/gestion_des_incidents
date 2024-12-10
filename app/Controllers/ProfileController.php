<?php
namespace App\Controllers;

use App\Models\UserModel;  // Votre modèle utilisateur
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    // Afficher les informations du profil
    public function index()
    {
        // Récupérer les données de l'utilisateur connecté
        $session = session();
        $userId = $session->get('user_id');
        
        // Charger le modèle
        $userModel = new UserModel();
        
        // Récupérer les informations de l'utilisateur par ID
        $user = $userModel->find($userId);
        
        // Passer les informations de l'utilisateur à la vue
        return view('profile', ['user' => $user]);
    }

    // Mettre à jour les informations du profil
    public function update()
    {
        $session = session();
        $userId = $session->get('user_id');
        $userModel = new UserModel();

        // Récupérer les nouvelles données du formulaire
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $newPassword = $this->request->getPost('new_password');
        
        // Si un nouveau mot de passe est fourni, le hacher
        if (!empty($newPassword)) {
            $password = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        // Mettre à jour l'utilisateur dans la base de données
        $data = [
            'email' => $email,
            'password' => $password,
        ];

        if (!$userModel->update($userId, $data)) {
            $session->setFlashdata('error', 'Erreur lors de la mise à jour des informations.');
            return redirect()->to('profile');
        }

        // Mettre à jour la session si l'email a changé
        if ($email !== $session->get('email')) {
            $session->set('email', $email);
        }

        $session->setFlashdata('success', 'Informations mises à jour avec succès.');
        return redirect()->to('profile');
    }
}
