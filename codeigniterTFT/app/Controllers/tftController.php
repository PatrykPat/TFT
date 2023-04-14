<?php

namespace App\Controllers;


use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\tftModel;
use CodeIgniter\Controller;

class tftController extends BaseController
{
    protected $db;
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
    public function admin() {
        $model = model(tftModel::class);    

        $data = [
            'users' => $model->getUsers(),
            //'lessen' => $model->getEmail()
        ];

        return view('templates/header', $data)
        .view ('tft/admin')
        .view('templates/footer');
    }

    public function lessen()
{
    $model = model(tftModel::class);

    // Retrieve data from the "soortlessen" table using Query Builder
    $data['result'] = $model->db->table('soortles')->select('naam')->get()->getResult();

    // Load the "lessen.php" view with the header and footer and pass the data to it
    return view('templates/header')
        . view('tft/lessen', $data)
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

    public function profiel(){
        $model = model(tftModel::class);
    return view('templates/header')
        . view('tft/profiel')
        . view('templates/footer');
    }


    public function rooster()
{
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM lessen');
    $rooster = $query->getResult();
    // Get the current week and year
    $week_number = isset($_GET['week']) ? $_GET['week'] : date('W');
    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

    // Set the first day of the week to Monday
    $first_day_of_week = strtotime($year . 'W' . str_pad($week_number, 2, '0', STR_PAD_LEFT) . '1');

    // Create an array of dates for the current week
    $date_array = [];
    for ($i = 0; $i < 7; $i++) {
        $date_array[] = date('Y-m-d', strtotime('+' . $i . ' days', $first_day_of_week));
    }
    
    // Fetch data from the database
    $rooster = $this->db->query("SELECT * FROM lessen")->getResult();

    // Pass the data and date array to the view
    return view('templates/header')
        . view('tft/rooster')
        . view('templates/footer');
    return view('templates/header', [
        'rooster' => $rooster,
        'date_array' => $date_array,
    ]);
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
}


