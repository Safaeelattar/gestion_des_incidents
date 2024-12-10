<?php
namespace App\Controllers;
use App\Models\IncidentModel;
use App\Models\ReponseModel;

class ReponseController extends BaseController
{
    // Afficher la page de réponse pour un incident spécifique
    public function reponse($incidentId = null)
{
    if ($incidentId === null) {
        return redirect()->to('/')->with('error', 'L\'ID de l\'incident est manquant.');
    }

    $incidentModel = new IncidentModel();
    $incident = $incidentModel->find($incidentId);

    // Vérifier si l'incident existe
    if (!$incident) {
        return redirect()->to('/')->with('error', 'Incident introuvable.');
    }

    // Passer l'incident à la vue
    return view('reponse', ['incident' => $incident]);
}


    // Enregistrer la réponse à un incident
    public function store()
    {
        $incidentId = $this->request->getPost('incident_id');
        $message = $this->request->getPost('message');

        $reponseModel = new ReponseModel();
        $data = [
            'incident_id' => $incidentId,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Insertion de la réponse
        if ($reponseModel->insert($data)) {
            return redirect()->to('/')->with('success', 'Réponse envoyée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi de la réponse.');
        }
    }
}
