<?php
class auth
{
    public function __construct()
    {
        $this->db = new database();
        $this->ss = new session();
    }

    public function is_auth()
    {
    	return ($_SESSION["is_auth"] == TRUE) ? TRUE : FALSE;
    }

    public function do_auth()
    {
        $stmt = $this->db->prepare('SELECT * FROM changeoffice WHERE login = :login and pass = :pass  LIMIT 1');
        $stmt->bindParam(':login', $_POST['login']);
        $stmt->bindParam(':pass', md5(md5($_POST['pass'])));
        $stmt->execute();
        return count($stmt->fetchall) > 0 ? TRUE : FALSE ;
    }
}
?>