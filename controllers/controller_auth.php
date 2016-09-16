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
        $content = $this->model->get_viewdata();
        return $viewdata["auth"] = $this->view->show_view("view_auth", $content);
    }

    function logout()
    {
        $this->model->logout();
        $viewdata = $this->do_default_viewdata();
        $this->view->show_view('view_auth', $viewdata);
    }
}
?>