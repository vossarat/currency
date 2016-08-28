<?php
class session
{

    public function id()
    {
        return session_id();
    }

    public function start()
    {
        session_start();
    }

    public function finish()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: /');
    }
    

}
?>