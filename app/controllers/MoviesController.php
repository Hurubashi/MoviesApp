<?php

class MoviesController extends Controller
{

    function __construct()
	{
		$this->model = new MoviesModel();
		$this->view = new View();
    }
    
    function action_main()
	{	
        $data = $this->model->get_data();
        $this->view->generate('movies/main.php', $data);
        
    }
    
    
}