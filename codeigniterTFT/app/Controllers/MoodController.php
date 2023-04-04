<?php

namespace App\Controllers;


use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\NewsModel;

class MoodController extends BaseController
{
    public function index()
    {

        $model = model(MoodModel::class);

        $data = [
            'mood'  => $model->getMood(),
            'title' => 'Jou moods',
        ];

        return view('templates/header', $data)
            . view('mood/index')
            . view('templates/footer'); 
      
    }

    public function view($slug = null)
    {
        $model = model(MoodModel::class);

        $data['news'] = $model->getMood($slug);

        if (empty($data['mood'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $mood);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('mood/view')
            . view('templates/footer');
    }
    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a mood item'])
                . view('mood/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['datum', 'mood','plek']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
        //     'datum' => 'required|max_length[255]|min_length[8]',
        //     'mood'  => 'required|max_length[5000]|min_length[1]',
            'plek'  => 'required|max_length[5000]|min_length[2]'
        ])) {
            // The validation fails, so returns the form.
        //     return view('templates/header', ['title' => 'Create a mood item'])
        //         . view('mood/create')
        //         . view('templates/footer');
        }

        $model = model(MoodModel::class);
        $user = auth()->user()->id;

        $model->save([
            'datum' => $post['datum'],
            'user'  => $user,
            'mood'  => $post['mood'],
            'plek' => $post['plek']
        ]);

        return view('templates/header', ['title' => 'Create a mood item'])
            . view('mood/success')
            . view('templates/footer');
    }
}
