<?php

class controller
{
    function __construct()
    {
        $model = "model_".array_pop(explode("_",get_class($this))); //имя модели для нового экземпляра класса
        $this->model = new $model;
        $this->view = new view();
    }

    function do_default_viewdata($template_positions = array("header","topmenu", "auth", "footer")) //контент позиций по умолчанию
    {
        foreach ($template_positions as $position) {
            $controller_position = "controller_$position";
            $controller          = new $controller_position;
            $viewdata[$position] = $controller->index();
        }
        return $viewdata;
    }
    
    function js($jsfile)
    {
    	include "js/$jsfile.js";
    }

}
?>
