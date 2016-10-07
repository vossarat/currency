<?php
class auth
{
    public function __construct()
    {
        $this->db = new database();
    }

    public function is_auth()
    {
        return ($_SESSION["is_auth"] == TRUE) ? TRUE : FALSE;
    }
    
    public function do_auth()
    {
        $stmt = $this->db->prepare('SELECT * FROM changeoffice WHERE login = :login and pass = :pass  LIMIT 1');
        $stmt->bindParam(':login', $_POST['login']);
        $stmt->bindParam(':pass', $_POST['pass']);//md5(md5($_POST['pass'])));
        $stmt->execute();        
        session_start();
        count($stmt->fetchall()) > 0 ? $_SESSION["is_auth"] = TRUE : $_SESSION["is_auth"] = FALSE ;
    }
	
	public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        
    }
	
    public function chk_auth()
    {
        $chk = 0;
        if (isset($_COOKIE['hash']))
        {
            $stmt_chk_user = $this->db->prepare('SELECT hash FROM users WHERE hash = :hash');
            $stmt_chk_user->bindParam(':hash', $_COOKIE['hash']);
            $stmt_chk_user->execute(array('hash'=> $_COOKIE['hash']));
            $chk_user = $stmt_chk_user->fetchall();

            if (count($chk_user) > 0)
            {
                $chk = 1;
            }
        }
        return $chk;
    }// end function check()
}
?>