<?php

namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins'; // Nom de votre table
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = ['email', 'password']; // Champs autorisés
    protected $useTimestamps = true; // Si vous avez des timestamps dans la base de données
}
