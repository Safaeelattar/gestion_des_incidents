<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function register()
    {
        helper(['form']); // Charger le helper de formulaire

        // Définir les règles de validation pour chaque champ
        $validation = \Config\Services::validation();

        $validation->setRules([
            'full_name'      => 'required|min_length[3]|max_length[255]',
            'email'          => 'required|valid_email|is_unique[users.email]',
            'password'       => 'required|min_length[10]|max_length[15]',
            'confirm_password' => 'required|matches[password]',
        ]);

       // Vérifier si la validation passe
        if (!$this->validate($validation->getRules())) {
            return view('register', [
                'validation' => $this->validator,
            ]);
        }
        
        // Récupérer les données envoyées par le formulaire
        $data = [
           'full_name' => $this->request->getPost('full_name'),
          'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash du mot de passe
        ];
        // Débogage des données
        log_message('debug', 'Données à insérer : ' . print_r($data, true));
        
        // Vérification de la présence de full_name et email
        if (empty($data['full_name']) || empty($data['email'])) {
            return redirect()->to('register')->with('error', 'Le nom complet et l\'email sont obligatoires.');
        }
        // Charger le modèle UserModel
        $userModel = new UserModel();

        // Tentative d'insertion dans la base de données
        if ($userModel->insert($data)) {
            // Si l'insertion réussie, afficher un message de succès
            
            return redirect()->to('register')->with('success', 'Inscription se fait avec succée !');
        } else {
            // Si l'insertion échoue, obtenir les erreurs du modèle
            return redirect()->to('register')->with('error', 'Erreur lors de l\'inscription.');
        }
    }
    public function listUsers()
    {
      
        $userModel = new UserModel(); // Charger le modèle UserModel
        $users = $userModel->findAll(); // Récupérer tous les utilisateurs

        return view('liste_users', ['users' => $users]);
    }
    public function delete($id)
    {
        // Instanciation correcte du modèle
        $userModel = new UserModel();

        // Suppression de l'utilisateur
        if ($userModel->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Utilisateur supprimé avec succès.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Échec de la suppression de l’utilisateur.']);
        }
    }
    
}