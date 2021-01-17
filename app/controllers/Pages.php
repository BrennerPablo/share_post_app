<?php

class Pages extends Controller{
    public function __construct(){

    }

    public function index(){
        
        if(isLoggedIn()){
            redirect('posts');
        }
        
        $data = [
            'title' => 'SharePosts',
            'description' => 'A simple social network built with SimpleMVC.',
        ];

        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About us',
            'description' => 'A simple social network built using SimpleMVC.',
        ];
        $this->view('pages/about', $data);
    }
}
