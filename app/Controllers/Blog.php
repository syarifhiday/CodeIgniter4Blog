<?php namespace App\Controllers;
use App\Models\PostsModel;

class Blog extends BaseController
{
    protected $postModel;
    public function __construct(){
        $this->postModel = new PostsModel();
    }

    public function home()
    {
        $post = $this->postModel->findAll();

        $data = [
            'title' => 'SecureDev',
            'posts' => $post
        ];

        return view('home', $data);
    }

    public function index()
    {
        $post = $this->postModel->findAll();

        $data = [
            'title' => 'Blog Posts',
            'posts' => $post
        ];

        return view('blog/post', $data);
    }

    public function detail($permalink)
    {
        $posts = $this->postModel->findAll();
        $post = $this->postModel->where(['permalink' => $permalink])->first();
        if(empty($post)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); 
        }
        $data = [
            'title' => $post['title'],
            'post' => $post,
            'posts' => $posts
        ];
        
        return view('blog/detailPost', $data);
    }

    public function search($query){
        $post = $this->postModel->like('title',$query)->get()->getResultArray();

        $data = [
            'title' => "Search for $query",
            'posts' => $post
        ];

        return view('blog/post', $data);
    }

    public function admin(){
        $post = $this->postModel->findAll();
        $data = [
            'title' => "Admin Blog Posts",
            'posts' => $post
        ];

        return view('admin/post', $data);
    }
    
    public function write(){
        $data = [
            'title' => "Add a Post",
        ];

        return view('admin/write', $data);
    }

    public function edit($permalink)
    {
        $post = $this->postModel->where(['permalink' => $permalink])->first();
        if(empty($post)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); 
        }
        $data = [
            'title' => "Edit Post",
            'post' => $post
        ];
        
        return view('admin/edit', $data);
    }

    public function save(){
        // validasi input
        if(!$this->validate([
            'title' => 'required|is_unique[posts.title]'
        ])){
            session()->setFlashdata('message', 'Post with that title is already. Please use another title.');
            return redirect()->to('admin/write');
        }

        $permalink = url_title($this->request->getVar('title'), '-', true);
        $this->postModel->save([
            'title'  => $this->request->getVar('title'),
            'thumbnail'  => $this->request->getVar('thumbnail'),
            'content'  => $this->request->getVar('content'),
            'meta_desc'  => $this->request->getVar('meta_desc'),
            'permalink'  => $permalink
        ]);

        session()->setFlashdata('message', 'Post Successfuly Added');
        return redirect()->to('/admin');
    }

    public function update(){
        $id = $this->request->getVar('id');

        $post = $this->postModel->where(['id' => $id])->first();

        // $this->postModel->where('permalink', $permalink);
        $this->postModel->update($id,[
            'title'  => $this->request->getVar('title'),
            'thumbnail'  => $this->request->getVar('thumbnail'),
            'content'  => $this->request->getVar('content'),
            'meta_desc'  => $this->request->getVar('meta_desc'),
            'permalink'  => $post['permalink']
        ]);

        session()->setFlashdata('message', 'Post Successfuly Updated');
        return redirect()->to('/admin');
    }

    public function delete($id){
        // $id = $this->request->getVar('id');

        // $this->postModel->where('permalink', $permalink);
        $this->postModel->delete(['id'=>$id]);

        session()->setFlashdata('message', 'Post Successfuly Deleted');
        return redirect()->to('/admin');
    }
}
