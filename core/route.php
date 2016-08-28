<?php
class route
{
    static function start()
    {
        $routes = $_GET['url']; // Запускаем ассоциативный массив параметров, переданных скрипту через URL
        if (!$routes) //Если только имя домена то запускаем контроллер default
        {
            $routes = 'default';
        }

        $routes         = rtrim($routes, '/'); //если есть убрать последний слэш
        $routes         = explode('/', $routes); // разобрать URL на массив

        $inControler = array_shift($routes); // Ищем контроллер
        $action      = array_shift($routes); // Ищем метод
        $param1      = array_shift($routes); // Параметр 1
        $param2      = array_shift($routes); // Параметр 2

    
        $file        = 'controllers/controller_'.$inControler.'.php';
              
        if (file_exists($file)) //Проверяем существование файла
        {
            require $file; // выполняем если есть

            $classcontroller = "Controller_$inControler";
            $controller = new $classcontroller; // создаем экземпляр класса контроллера


            if (method_exists($controller, $action)) {
                $controller->$action($param1,$param2);
                
            }
            else
            {
                $controller->index();
            }
        }
        else
        {
            $controller = new controller_404();
            $controller->index();
        }
    }
}
?>