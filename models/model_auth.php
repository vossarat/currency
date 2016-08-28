<?php

class model_auth extends model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_viewdata()
    {
        return $_SESSION["is_auth"] == TRUE ? '<a href="'.HOMEDIR.'/auth/logout"/><img src="/images/unlock.png" width="16" height="16"></a>' : '<a href="'.HOMEDIR.'/auth"/><img src="/images/lock.png" width="16" height="16"></a>';
    }

    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: / ');
    }

    public function auth()
    {
        $_SESSION["is_auth"] = $this->do_auth();
        if ($_SESSION["is_auth"] == TRUE)
        {
            echo "Авторизация пройдена";
        }
        else
        {
            echo "Авторизация не пройдена";
        }

    }
    
    public function is_auth()
    {
    	session_start();
    	return ($_SESSION["is_auth"] == TRUE) ? TRUE : FALSE;
    }

    public function do_auth()
    {	
        $stmt = $this->db->prepare('SELECT * FROM changeoffice WHERE login = :login AND pass = :pass');
        $stmt->bindParam(':login', $_POST['login']);
        $stmt->bindValue(':pass', md5(md5($_POST["pass"])));
        $stmt->execute();       
        return count($stmt->fetchall()) > 0 ? TRUE : FALSE ;
    }


}
?>
