<?php
class controller_changeoffice extends controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $viewdata = $this->do_default_viewdata();
        $content  = $this->model->get_viewdata();
        $viewdata["content"] = $this->view->show_view("view_changeoffice", $content);
        $viewdata['jsScript'] = "js/js_changeoffice.js";
        $viewdata['pagetitle'] = "Пункты обмена";
        $this->view->show_view('view_template', $viewdata, true);


        /*        if (!$_POST['action'])
        {
        $viewdata = $this->model->do_default_viewdata();
        $viewdata["pagetitle"] = "Пункты обмена";

        //if ($_POST["btn_submit"] == 'Добавить')$foo = 'add';
        //if ($_POST["btn_submit"] == 'Редактировать')$foo = 'edit';

        $this->model->index();
        $msg = $this->model->msg;
        $viewdata["content"] = $this->model->get_viewdata();
        $this->js("model_changeoffice");
        $this->view->show_view('view_changeoffice', $viewdata, $foo, $msg);
        }
        elseif ($_POST['action'] =='add')
        {
        $this->view->show_form('view_changeoffice_edit');
        }*/



    }
}

?>