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
    public function rooster()
    {
        // Retrieve lessons from the database
        $model = model(tftModel::class);
        $lessons = $lessonModel->findAll();

        // Pass lessons to the view
        $data['lessons'] = $lessons;

        // Load the view
    return view('templates/header', $data)
        . view('tft/rooster')
        . view('templates/footer');
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
