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
        if ($_POST["action"] == "auth_form") {
            $this->show_auth_form();
        }
        elseif ($_POST["action"] == "do_auth") {
            $this->do_auth();
        }
        elseif ($_POST["action"] == "logout") {
            $this->logout();
        }
        else {
            $content = $this->auth->is_auth();
            return $this->view->show_view("view_auth", $content, false, HOMEDIR."/js/js_auth.js");
        }
    }

    function logout()
    {
        $this->auth->logout();
        return $this->view->show_view("view_auth", $this->auth->is_auth());
    }


    function show_auth_form()
    {
        return $this->view->show_view("view_auth_form", NULL);
    }

    function do_auth()
    {
        $this->auth->do_auth();
        return $this->view->show_view("view_auth", $this->auth->is_auth());
    }

}
?>