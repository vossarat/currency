<?php
class controller_header extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //$_POST = TRUE;
        $content = $this->model->get_viewdata();
        return $viewdata["header"] = $this->view->show_view("view_header", $content);

    }
}
?>