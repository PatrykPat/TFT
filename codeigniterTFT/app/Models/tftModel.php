<?php

namespace App\Models;

use CodeIgniter\Model;
class lessenModel extends Model{
    protected $table = 'lessen';
    protected $allowedFields = ['id','idLessen', 'tijd','datum', 'maxdeelnemers', 'instructeur', 'SoortenLessen', 'maxdeelnemers'];

}
class usersModel extends Model{
    public function getUsers()
    {
        $user = auth()->user();
        $db = db_connect();
        $query = "SELECT u.*, a.secret FROM `users` u JOIN `auth_identities` a ON u.id = a.user_id";
        $selection =$db->query($query);
        return $selection->getResult();
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
class soortlesModel extends Model{

}
class tftModel extends Model
{
    protected $table = 'lessen';
<<<<<<< Updated upstream
    protected $allowedFields = ['idLessen', 'tijd','datum', 'maxdeelnemers', 'instructeur', 'SoortenLessen', 'maxdeelnemers'];

    public function gettft()
    {
        $user = auth()->user();
        $db = db_connect();
        $sql = "SELECT * FROM `lessen` ORDER BY datum ASC;";

        $selection =$db->query($sql);

        return $selection->getResult();
    }
    public function getlessen()
=======
    protected $allowedFields = ['id','idLessen', 'tijd','datum', 'maxdeelnemers', 'instructeur', 'SoortenLessen', 'maxdeelnemers'];
    public function get_rooster()
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        var_dump($sql);
        var_dump($selection);
=======
>>>>>>> Stashed changes

        return $selection->getResult();
    }
    protected $tftModel;

<<<<<<< Updated upstream
    // public function __construct()
    // {
    //     // $this->config->set_item('csrf_protection', false);
        
    //     $this->tftModel = new tftModel();
    // }
   
    public function index()
=======
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
        $query = "SELECT u.*, a.secret FROM `users` u JOIN `auth_identities` a ON u.id = a.user_id";
        $selection =$db->query($query);
        return $selection->getResult();
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
>>>>>>> Stashed changes
    {
        
        $model = model(tftModel::class);
        // $data_user = $this->tftModel->getUser();
        $data = [
            'tft'  => $model->gettft(),
            'email' => $model->getEmail(),
            'naam' => 'Nieuwe tft',
        ];
        
        return view('templates/header', $data)
        . view('tft/index')
        . view('templates/footer');
    }
// Edit profile
// public function profiel()
// {
//     $session = session();

//     if (! $userId = $session->get('user')['id']) {
//         // kan userid niet in sessie vinden
//         var_dump('UID Session Lookup failure', $session->get('user'));
//         return;
//     }

//     // fetching user data, from db
//     $tftModel = new tftModel();
//     if (! $user = $tftModel->find($userId)) {
//         // kan user niet vinden in db
//         var_dump('User Lookup failure', $userId);
//         return;
//     }

//     if ($postData = $this->request->getPost())
//     {
//         //  Updating the data
//         $tftModel->update($userId, $postData);
//         $user = $tftModel->find($userId);
//     }
//     // var_dump('user', $user);
//     $session->set(['user'=>$user]);
//     var_dump($user);

//     return view('templates/header')
//          . view('tft/profiel', ['user' => $user])
//          . view('templates/footer');
// }

    public function getUser()
    {
        
        // Get the current user's ID from the session
        $userId = session('user_id');
        // $user_id = session('user_id');
        // echo 'User ID: ' . $userId;
        
        // Load the user's data from the database
        $userModel = new tftModel();
        $user = $userModel->find($userId);
        if (!$user) {
            throw new PageNotFoundException('User not found');
        }
        return $user;
    }
    public function profiel()
    {
        $user = auth()->user();
        $userId = $user ? $user->id : null;
        // Debug
        // echo 'User ID: ' . $userId;
        $model = model(tftModel::class);
        $user = $model->find($userId);
        if (!$user) {
            throw new PageNotFoundException('User not found');
        }
        // return $user;

        $data = [
            'user' => $user,
            'auth_email' => $model->getEmail(),
        ];
        // var_dump($data);


        return view('templates/header', $data)
        .view ('tft/profiel')
        .view('templates/footer');

    }
    public function admin() {
        $model = model(tftModel::class); 
        $user = $model->getUsers(session()->get('user_id'));   

        $data = [
            'users' => $user,
            // 'auth_identities' => $model->getEmail(),
        ];

        return view('templates/header', $data)
        .view ('tft/admin')
        .view('templates/footer');
    }
    
    public function create()
    {
        
        helper('form');
       

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Maak een les aan'])
                . view('tft/create')
                . view('templates/footer');
        }
        // gegevens opgehaald 
        $post = $this->request->getPost(['username', 'date', 'tijd']);


        if(! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body' => 'required|max_length[5000]|min_length[10]',
        ])) {
            return view('templates/header', ['title' => 'Maak een les hier aan'])
            .view ('tft/create')
            .view('templates/footer');
        }
        $model = new tftModel();
        $model->save([
            'username' => $post['username'],
            'date' => $post['date'],
            'tijd' => $post['tijd'],
        ]);
    
        // Redirect back to the create page
        return redirect()->to('/create');
        
    }

    public function updateRole()
    {
        if($_POST && isset($_POST['role'])) {
            foreach($_POST['role'] as $userId => $role) {
                switch($role) {
                    case 'klant':
                        $newRole = 'klant';
                        break;
                    case 'instructeur':
                        $newRole = 'instructeur';
                        break;
                    case 'admin':
                        $newRole = 'admin';
                        break;
                    default:
                        // handle invalid role value
                        break;
                }
               
                echo "userId: " . $userId . "<br>";
                echo "role: " . $role . "<br>";
                $this->tftModel = new tftModel();
            }
        }
    }
    public function updateProfiel()
    {
        $user = auth()->user();
        $model = new tftModel();
        $data = [
		'username'	=> $this->request->getPost('username'),
        'secret'	=> $this->request->getPost('email'),
        'leeftijd' => $this->request->getPost('leeftijd'),
		'geboortedatum'		=> $this->request->getPost('geboortedatum'),
        ]; }

}