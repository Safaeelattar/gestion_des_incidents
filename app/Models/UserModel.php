<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nom de la table
    protected $primaryKey = 'id';

    // Colonnes accessibles pour les opérations d'insertion
    protected $allowedFields = ['full_name', 'email', 'password'];

    // Active la gestion automatique des colonnes created_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}
