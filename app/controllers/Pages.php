<?php
    class Pages extends Controller{
        public function __construct(){
            // echo 'Pages loaded';
        }
        public function index(){
            $data=[
                'title'=>'WELCOME'
            ];
            $this->view('pages/index', $data);
        }
        public function about($id){
            $this->view('pages/about');

        }
    }