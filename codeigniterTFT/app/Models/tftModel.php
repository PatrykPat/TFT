<?php

namespace App\Models;

use CodeIgniter\Model;

class tftModel extends Model
{
    protected $table = 'lessen';
    protected $allowedFields = ['idLessen', 'tijd','datum', 'maxdeelnemers', 'instructeur', 'SoortenLessen', 'maxdeelnemers'];
    protected $tableU = 'users';
    protected $allowedFieldsU = ['id', 'username','password', 'user_email', 'leeftijd', 'telnummer', 'role', 'geboortedatum', 'secret', 'secret2'];
    public function get_rooster()
    {
        $user = auth()->user();
        $db = db_connect();
        $sql = "SELECT * FROM `lessen` ORDER BY datum ASC;";

        $selection =$db->query($sql);

        return $selection->getResult();
    }
    public function get_lessen()
    {
        $user = auth()->user();
        $db = db_connect();
        $sql = "SELECT * FROM `lessen` ORDER BY datum ASC;";

        $selection =$db->query($sql);
        // var_dump($sql);
        // var_dump($selection);

        return $selection->getResult();
        
    }

    
    public function getById($id)
    {
        return $this->find($id);
    }
    
    public function gettft($slug = false)
    {
     if ($slug === false) {
        return $this->findAll();
     }

     return $this->where(['mood' => $slug])->first();
    }

    public function getEmail()
    {
        $user = auth()->user();
        $db = db_connect();
    
        $sql = "SELECT `secret` FROM `auth_identities` WHERE `user_id` = ? ORDER BY `id` ASC;";
        $selection = $db->query($sql, [$user->id]);
        $result = $selection->getResult();
    
        if (count($result) > 0) {
            return $result[0]->secret;
        }
    
        // return null;
    }
    
    public function getUsers()
    {
        $user = auth()->user();
        $db = db_connect();
        // $query = "SELECT `u`.*, `a`.`secret`, `a`.`secret2` FROM `users` `u` INNER JOIN `auth_identities` `a` ON `u`.`id` = `a`.`user_id` WHERE `u`.`id` = ?;";
        $query = "SELECT u.*, a.secret FROM `users` u JOIN `auth_identities` a ON u.id = a.user_id";
        // $query = "SELECT * FROM users;";
        // $select = $db->query($query, [$user['id']]);
        $selection =$db->query($query);
        
        
        // var_dump($user);
        return $selection->getResult();
        // var_dump($select);
    }

    public function updateUser($userId, $newUsername, $secret,) {
        $this->db->table('users')
                 ->where('id', $userId)
                 ->update([
                     'username' => $newUsername,
                     'secret' => $secret,
                 ]);
                 return $this->db->affectedRows() > 0;
    }
    
    public function updateRole($userId, $newRole) 
    {
        $userModel = new tftModel();
        $user = $userModel->find($userId);
        $user->role = $newRole;
        $userModel->save($user);
        var_dump($userId);
        var_dump($newRole);
        return $this->update($userId, ['role' => $newRole]);
        
    }

}