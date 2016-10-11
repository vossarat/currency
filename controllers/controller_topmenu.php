<?php
class controller_topmenu extends controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new model_topmenu;
    }

    function index()
    {
        //$_POST = TRUE;
        $content = $this->model->get_viewdata();
        return $viewdata["topmenu"] = $this->view->show_view("view_topmenu", $content);
    }
}
?>