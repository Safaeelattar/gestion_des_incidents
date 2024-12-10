<?php
namespace App\Controllers;

use App\Models\IncidentModel;
use App\Models\ReponseModel;
use App\Models\NotificationModel;
// Import de l'interface ResponseInterface


class IncidentController extends BaseController
{
    public function create()
    {
        return view('form');  // Assurez-vous que la vue s'appelle 'incident_form.php'
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'fullName'      => 'required|min_length[3]|max_length[255]',
            'email'         => 'required|valid_email',
            'phone'         => 'required|min_length[10]|max_length[15]',
            'incidentType'  => 'required|in_list[technique,logistique,autre]',
            'date_incident' => 'required|valid_date[Y-m-d]',
            'description'   => 'required|min_length[10]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return view('form', [
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'full_name'     => $this->request->getPost('fullName'),
            'email'         => $this->request->getPost('email'),
            'phone'         => $this->request->getPost('phone'),
            'incident_type' => $this->request->getPost('incidentType'),
            'date_incident' => $this->request->getPost('date_incident'),
            'description'   => $this->request->getPost('description')
        ];

        $incidentModel = new IncidentModel();
        $insertSuccess = $incidentModel->insert($data);

        if (!$insertSuccess) {
            $errors = $incidentModel->errors();
            return redirect()->to('/create')->with('error', 'Erreur d\'insertion.')->with('model_errors', $errors);
        }

        return redirect()->to('/create')->with('success', 'Incident enregistré avec succès.');
    }

    public function tables()
    {
        $incidentModel = new IncidentModel();
        $incidents = $incidentModel->findAll();

        return view('tables', ['incidents' => $incidents]);
    }
    
    public function reponse($id)
    {
        $incidentModel = new \App\Models\IncidentModel();
        $incident = $incidentModel->find($id);
    
        if (!$incident) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    
        return view('reponse', [
            'incident' => $incident
        ]);
    }
    

    public function envoyerReponse($id)
    {
        $reponseModel = new \App\Models\ReponseModel();
        $reponse = $this->request->getPost('reponse');
        
        // Vérifier si la réponse est vide
        if (empty($reponse)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Le champ réponse est obligatoire.'
            ]);
        }
    
        // Optionnel : vérifier que l'incident existe
        $incidentModel = new \App\Models\IncidentModel();
        $incident = $incidentModel->find($id);
        if (!$incident) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Incident non trouvé.'
            ]);
        }
    
        // Si l'utilisateur est connecté, récupérer son ID, sinon utiliser un ID par défaut (null)
        $userId = session()->get('user_id') ?: null;  // ID utilisateur de la session, ou null si non connecté
    
        // Préparer les données à insérer
        $data = [
            'incident_id' => $id,
            'message' => $reponse,
            'user_id' => $userId,  // Lier la réponse à l'utilisateur connecté ou null
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        // Tenter d'insérer la réponse dans la base de données
        if ($reponseModel->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Réponse envoyée avec succès.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de l\'envoi de la réponse.'
            ]);
        }
    }
    

    
 // Méthode pour afficher les notifications
 public function notifications()
{
    // Vérifiez si l'utilisateur est connecté
    if (!session()->has('user_id')) {
        return redirect()->to(base_url('login')); // Rediriger vers la page de connexion si non connecté
    }

    // Récupérer l'ID de l'utilisateur connecté
    $user_id = session()->get('user_id');

    // Récupérer les réponses associées à cet utilisateur
    $reponseModel = new ReponseModel();
    $reponses = $reponseModel->where('user_id', $user_id)->findAll();

    // Passer les réponses à la vue
    return view('notifications', ['reponses' => $reponses]);
}


public function showNotifications()
{
    $userId = session()->get('user_id');
    
    $reponseModel = new \App\Models\ReponseModel();
    $reponses = $reponseModel->where('user_id', $userId)->findAll();

    // Vérifier les données récupérées
    var_dump($reponses); // ou dd($reponses);
    
    return view('notification_view', ['reponses' => $reponses]);
}


    
}
    