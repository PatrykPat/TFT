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
            'tft'  => $model->gettft(),
            'title' => 'Jou tfts',
        ];

        return view('templates/header', $data)
            . view('tft/index')
            . view('templates/footer'); 
      
    }

    public function view($slug = null)
    {
        $model = model(tftModel::class);

        $data['news'] = $model->gettft($slug);

        if (empty($data['tft'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $tft);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('tft/view')
            . view('templates/footer');
    }
    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a tft item'])
                . view('tft/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['datum', 'tft','plek']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
        //     'datum' => 'required|max_length[255]|min_length[8]',
        //     'tft'  => 'required|max_length[5000]|min_length[1]',
            'plek'  => 'required|max_length[5000]|min_length[2]'
        ])) {
            // The validation fails, so returns the form.
        //     return view('templates/header', ['title' => 'Create a tft item'])
        //         . view('tft/create')
        //         . view('templates/footer');
        }

        $model = model(tftModel::class);
        $user = auth()->user()->id;

        $model->save([
            'datum' => $post['datum'],
            'user'  => $user,
            'tft'  => $post['tft'],
            'plek' => $post['plek']
        ]);

        return view('templates/header', ['title' => 'Create a tft item'])
            . view('tft/success')
            . view('templates/footer');
    }
}
