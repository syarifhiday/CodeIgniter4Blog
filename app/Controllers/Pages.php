<?php namespace App\Controllers;
use App\Models\PostsModel;


class Pages extends BaseController
{
    protected $postModel;
    public function __construct(){
        $this->postModel = new PostsModel();
    }

    public function index($permalink = '')
    {
        echo "get mahasiswa $permalink";
    }

    public function about()
    {
        $post = $this->postModel->findAll();

        $data = [
            'title' => 'About Me',
            'posts' => $post
        ];
        
        return view('pages/about', $data);

    }
    public function contact()
    {
        $post = $this->postModel->findAll();

        $data = [
            'title' => 'Contact',
            'posts' => $post
        ];
        
        return view('pages/contact', $data);

    }
    
}
