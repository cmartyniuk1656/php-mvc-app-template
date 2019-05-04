<?php

namespace App\Controllers;


class PagesController {

    public function home() {
        
        return view('index');
    }

    public function contact() {
        return view('contact');
    }
    

    public function about() {
        return view('about');
    }

    public function aboutCulture() {
        return view('about-culture');;
    }

    public function names() {
        App::get('database')->insert('users', [

            'name' => $_POST['name']
        
        ]);
        
        header('Location: /');
    }

}