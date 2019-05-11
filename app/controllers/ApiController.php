<?php

class ApiController extends Controller
{

    function __construct()
	{
		$this->model = new ApiModel();
		$this->view = new View();
    }
    
    function action_index()
	{	
        $data = $this->model->get_data();
        $this->view->generate('api/index.php', $data);
        
    }
    
    
}