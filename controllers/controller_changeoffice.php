<?php

class controller_changeoffice extends controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new model_changeoffice;
    }

    function index()
    {
    	if ($_POST["action"] == "add"){
			$this->add();
		}
		else {
			$this->view_default();
		}        
        
    }
    
    function view_default() {
		$viewdata = $this->do_default_viewdata();
        $content  = $this->model->get_viewdata();
        $viewdata["pagetitle"] = "Заголовок страницы";
        $viewdata["content"] = $this->view->show_view("view_changeoffice", $content, false, HOMEDIR."/js/js_changeoffice.js");        
        $this->view->show_view("view_template", $viewdata, true);
	}
    
    function add() {
    	echo  $this->view->show_view("view_changeoffice_edit", "", false);		
	}
}

?>