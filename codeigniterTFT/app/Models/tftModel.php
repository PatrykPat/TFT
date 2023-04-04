<?php

namespace App\Models;

use CodeIgniter\Model;

class tftModel extends Model
{
    protected $table = 'lessen';
    protected $allowedFields = ['idLessen', 'tijd','datum', 'maxdeelnemers', 'instructeur', 'SoortenLessen', 'maxdeelnemers'];

    public function gettft()
    {
        $user = auth()->user();
        $db = db_connect();
        $sql = "SELECT * FROM `lessen` ORDER BY datum ASC;";

        $selection =$db->query($sql);

        return $selection->getResult();
    }
}