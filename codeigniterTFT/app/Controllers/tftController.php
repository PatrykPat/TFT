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
    public function kalender(){

        $model = model(tftModel::class);

        $data = [
            'lessen' => $model->getlessen()
        ];
    return view('templates/header', $data)
        . view('tft/kalender')
        . view('templates/footer');
    }
}
