<?php
class controller_auth extends controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new model_auth();
    }

    function index()
    {       
        if ($_POST["action"] == "auth") {
			$this->show_auth_form();
		}
		elseif ($_POST["action"] == "do_auth") {
			$this->show_auth_form();
		}
		else {
			$content = $this->model->get_viewdata();        
        	return $this->view->show_view("view_auth", $content, false, HOMEDIR."/js/js_auth.js");
		}
    }

   
    function logout()
    {
        $this->model->logout();
        $viewdata = $this->do_default_viewdata();
        $this->view->show_view('view_auth', $viewdata);
    }
    
    function show_auth_form() {
        return $this->view->show_view("view_form_auth", NULL);
	}
	
	function do_auth() {
        return $this->view->show_view("view_form_auth", NULL);
	}
    
}
?>