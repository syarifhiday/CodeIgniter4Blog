<?php namespace App\Controllers;

class Pages extends BaseController
{
    public function index($permalink = '')
    {
        echo "get mahasiswa $permalink";
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        
        return view('pages/about', $data);

    }
    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];
        
        return view('pages/contact', $data);

    }
    
}
