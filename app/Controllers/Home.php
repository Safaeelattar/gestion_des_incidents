<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        
        return view('index');
    }

 
    public function dashboard():string
    {
       

        return view('dashboard'); // Vue pour le tableau de bord admin
        
  
}

    // public function sign_in()
    // {
    //     $validation = \Config\Services::validation();

    //     if ($this->request->getMethod() === 'post') {
    //         $validation->setRules([
    //             'email' => 'required|valid_email',
    //             'password' => 'required',
    //         ]);

    //         if (!$validation->withRequest($this->request)->run()) {
    //             return redirect()->to('/sign_in_user')->withInput()->with('errors', $validation->getErrors());
    //         }

    //         // Vérification de l'email et du mot de passe
    //         $userModel = new UserModel();
    //         $user = $userModel->getUserByEmail($this->request->getPost('email'));

    //         if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
    //             // Authentification réussie, créer la session
    //             session()->set('user_id', $user['id']);
    //             session()->set('username', $user['name']);
    //             return redirect()->to('/form'); // Redirection après la connexion
    //         } else {
    //             return redirect()->to('/sign_in_user')->with('error', 'Identifiants incorrects');
    //         }
    //     }
    // }

    // // Déconnexion de l'utilisateur
    // public function logout()
    // {
    //     session()->destroy();
    //     return redirect()->to('/sign_in_user');
    // }


    public function form(): string
    {
        return view('form');
    }


    public function sign_up_user(): string
    {
        return view('sign_up_user');
    }
    //fonction de sign up 
    public function register_user()
    {
        $model = new UserModel();

        // Validation des données
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[3]|max_length[20]',
        ]);

        // Si la validation échoue, renvoyer la vue avec les erreurs
        if (!$this->validate($validation->getRules())) {
            return view('register_user', [
                'validation' => $this->validator,
            ]);
        }

        // Préparer les données pour insertion
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hachage du mot de passe
        ];

        // Insérer les données dans la base de données
        $insertSuccess = $model->insert($data);

        // Si l'insertion échoue, obtenir les erreurs du modèle
        if (!$insertSuccess) {
            // Affichage des erreurs sous forme de message
            $errors = $model->errors();
            return redirect()->to('/register_user')->with('error', 'Erreur d\'insertion.')->with('model_errors', $errors);
        }

        // Redirection avec un message de succès
        return redirect()->to('/register_user')->with('success', 'Votre inscription a été bien enregistrée!');
    }
}

  

   
    
    
    