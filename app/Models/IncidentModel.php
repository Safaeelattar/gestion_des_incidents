<?php
namespace App\Models;

use CodeIgniter\Model;

class IncidentModel extends Model
{
    protected $table = 'incidents'; // Table des incidents
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = ['full_name', 'email', 'phone', 'incident_type', 'date_incident', 'description']; // Champs autorisés
    protected $useTimestamps = true; // Utilisation des timestamps

    
    // Méthode pour obtenir un incident par ID
    public function getIncidentById($incidentId)
    {
        return $this->where('id', $incidentId)->first();
    }

    // Méthode pour mettre à jour l'état de l'incident
    public function updateIncidentStatus($incidentId, $status)
    {
        return $this->update($incidentId, ['status' => $status]);
    }
}
?>