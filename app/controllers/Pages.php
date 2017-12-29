<?php
    class Pages{
        public function __construct(){
            // echo 'Pages loaded';
        }
        public function index(){
            echo 'hi';
        }
        public function about($id){
            echo $id;
        }
    }