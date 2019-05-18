<?php

class MoviesController extends Controller
{

    function __construct()
	{
		$this->model = new MoviesModel();
		$this->view = new View();
    }
    
    function action_index()
	{	
        $data = $this->model->getData();
        $this->view->generate('movies/index.php', $data);
        
    }

    function action_ajaxMovie() {
        $this->view->generate('movies/ajaxMovie.php');
    }
    
    
}