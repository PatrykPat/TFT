<?php

namespace App\Models;

use CodeIgniter\Model;

class MoodModel extends Model
{
    protected $table = 'mood';

    protected $allowedFields = ['naam', 'mood','user', 'plek'];

    public function getMood()
    {
        $user = auth()->user();
        $db = db_connect();
        $sql = "SELECT * FROM `mood` ORDER BY datum ASC;";

        $selection =$db->query($sql);

        return $selection->getResult();
    }
}