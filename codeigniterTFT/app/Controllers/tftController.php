<?php

namespace App\Controllers;


use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\NewsModel;

class tftController extends BaseController
{
    public function index()
    {

        $model = model(tftModel::class);

        $data = [
            'tft'  => $model->gettft()
        ];

        return view('templates/header', $data)
            . view('tft/index')
            . view('templates/footer'); 
    }
    public function lessen(){

        $model = model(tftModel::class);

        $data = [
            'lessen' => $model->getlessen()
        ];
    return view('templates/header', $data)
        . view('tft/lessen')
        . view('templates/footer');
    }
    public function shop(){

        $model = model(tftModel::class);

        $data = [
            'lessen' => $model->getlessen()
        ];
    return view('templates/header', $data)
        . view('tft/shop')
        . view('templates/footer');
    }
    public function contact(){
        $model = model(tftModel::class);
    return view('templates/header')
        . view('tft/contact')
        . view('templates/footer');
    }
<<<<<<< Updated upstream
    public function kalender(){

        $model = model(tftModel::class);

        $data = [
            'lessen' => $model->getlessen()
        ];
    return view('templates/header', $data)
        . view('tft/kalender')
        . view('templates/footer');
=======
    public function rooster()
    {
        $model = model(tftModel::class);
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        $week_number = isset($_GET['week']) ? $_GET['week'] : date('W');

        // Set the first day of the week to Monday
        $first_day_of_week = strtotime($year . 'W' . str_pad($week_number, 2, '0', STR_PAD_LEFT) . '1');

        // Create an array of dates for the current week
        $date_array = [];
        for ($i = 0; $i < 7; $i++) {
            $date_array[] = date('Y-m-d', strtotime('+' . $i . ' days', $first_day_of_week));
        }

        // Fetch data from the database
        $rooster = $this->$model->findAll();
var_dump($rooster);

        // Pass the data and date array to the view
        $data['rooster'] = $rooster;
        $data['date_array'] = $date_array;
    
    return view('templates/header')
        . view('tft/rooster', $data)
        . view('templates/footer');
    return view('templates/header', [
        'rooster' => $rooster,
        'date_array' => $date_array,
        'first_day_of_week' => $first_day_of_week,
    ]);
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

public function updateUser($userId, $newUsername, $leeftijd, $secret, $newGeboortedatum) {
    $this->db->table('users')
             ->where('id', $userId)
             ->update([
                 'username' => $newUsername,
                 'leeftijd' => $leeftijd,
                 'secret' => $secret,
                 'geboortedatum' => $newGeboortedatum
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
        
>>>>>>> Stashed changes
    }

    // public function updateRole()
    // {
    //     if($_POST && isset($_POST['role'])) {
    //         foreach($_POST['role'] as $userId => $role) {
    //             switch($role) {
    //                 case 'klant':
    //                     $newRole = 'klant';
    //                     break;
    //                 case 'instructeur':
    //                     $newRole = 'instructeur';
    //                     break;
    //                 case 'admin':
    //                     $newRole = 'admin';
    //                     break;
    //                 default:
    //                     // handle invalid role value
    //                     break;
    //             }
               
    //             echo "userId: " . $userId . "<br>";
    //             echo "role: " . $role . "<br>";
    //             $this->tftModel = new tftModel();
    //         }
    //     }
    }
