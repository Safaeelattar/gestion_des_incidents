<?php

namespace App\Models;

use CodeIgniter\Model;

class ReponseModel extends Model
{
    protected $table = 'reponse'; // Nom de la table
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = ['incident_id', 'user_id', 'message', 'created_at']; // Champs modifiables
    protected $useTimestamps = true; // Active automatiquement created_at et updated_at
}
