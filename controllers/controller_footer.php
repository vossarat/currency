<?php
class controller_footer extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $content = $this->model->get_viewdata();
        return $viewdata["footer"] = $this->view->show_view("view_footer", $content);

    }
}
?>