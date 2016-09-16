<?php
class controller_404 extends controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new model_404();
    }

    function index()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");        
        $viewdata = $this->do_default_viewdata();        
        $content = $this->model->get_viewdata();
        $viewdata["content"] = $this->view->show_view("view_404", $content);        
        $this->view->show_view('view_template', $viewdata, true);
    }
}
?>