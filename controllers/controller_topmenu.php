<?php
class controller_topmenu extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //$_POST = TRUE;
        $content = $this->model->get_viewdata();
        return $viewdata["topmenu"] = $this->view->show_view("view_topmenu", $content);
    }
}
?>