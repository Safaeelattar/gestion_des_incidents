<?php
namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table      = 'reponse';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'message', 'status'];

    public function createNotification($userId, $message)
    {
        $data = [
            'user_id' => $userId,
            'message' => $message,
            'status'  => 'unread',  // Statut de notification (non lue)
        ];
        return $this->insert($data);
    }

    public function getNotificationsByUser($userId)
    {
        return $this->where('user_id', $userId)->orderBy('created_at', 'desc')->findAll();
    }
}
