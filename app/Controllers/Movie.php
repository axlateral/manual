<?php namespace App\Controllers;
use App\Models\MovieModel;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;


class Movie extends ResourceController {

        public function index(){

            $movie = new MovieModel();
            $data = [ 
                'movies' => $movie->asObject()->paginate(10),
                'pager' => $movie->pager
            ];

            
            $this->_loadDefaultView('Crear película',$data,'index');
        }

        public function new()
        {
            $this->_loadDefaultView('Crear película',[],'new');           
        }

        public function create()
        {
            echo 'create';
        }

        public function show($id = null)
        {
            $movie = new MovieModel();
            var_dump($movie->get($id));
            
        }
            
        private function _loadDefaultView($title, $data, $view)
        {
            $dataHeader = [
                'title' => $title
            ];
            
            echo view("dashboard/templates/header", $dataHeader);
            echo view("dashboard/movie/$view",$data);
            echo view("dashboard/templates/footer");
        }
}