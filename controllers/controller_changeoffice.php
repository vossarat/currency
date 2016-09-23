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
    	if ($_POST["action"] == "add_form"){
			$this->show_add_form();
		}
		elseif ($_POST["action"] == "add_office"){
			$this->do_add_office();
		}
		elseif ($_POST["action"] == "edit_form"){
			$this->show_edit_form();
		}
		elseif ($_POST["action"] == "del"){
			$this->del_office();
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
    
    function show_add_form() {
    	$this->view->show_view("view_changeoffice_edit", "", false, HOMEDIR."/js/js_changeoffice_edit.js");		
	}
	
	function do_add_office() {
    	$this->model->add_changeoffice() ;		
	}
	
	function del_office() {
    	$this->model->del_changeoffice() ;		
	}
	
    function show_edit_form() {
    	$content = $this->model->edit_changeoffice();
    	$this->view->show_view("view_changeoffice_edit", $content, false, HOMEDIR."/js/js_changeoffice_edit.js");		
	}
}

?>