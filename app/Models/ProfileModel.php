<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Nom de la table
    protected $primaryKey = 'id';    // Clé primaire

    protected $allowedFields = ['email', 'password']; // Champs autorisés à être mis à jour
    protected $useTimestamps = true;  // Si vous utilisez des timestamps
}
