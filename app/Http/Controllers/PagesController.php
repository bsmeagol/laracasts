<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $tasks = [
            'go to the store',
            'go to the market'
        ];


        return view('welcome', [
            'tasks' => $tasks,
            'mood' => request('mood')
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
}
