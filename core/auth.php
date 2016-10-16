<?php
class auth
{
    public function __construct()
    {
        $this->db = new database();
    }

    public function do_auth()
    {
        $stmt      = $this->db->prepare('SELECT * FROM changeoffice WHERE login = :login and pass = :pass  LIMIT 1');
        $stmt->bindValue(':login', $_POST['login']);
        $stmt->bindValue(':pass', $_POST['pass']);//md5(md5($_POST['pass'])));
        $stmt->execute();
        $auth_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $auth_data ) {
            $hash      = $this->generate_hash(10);

            $stmt_hash = $this->db->prepare('UPDATE changeoffice SET hash=:hash, authtime=:loging_time WHERE id = :id');
            $stmt_hash->bindValue(':id', $auth_data['id']);
            $stmt_hash->bindValue(':hash', $hash);
            $stmt_hash->bindValue(':loging_time', time());
            $stmt_hash->execute();

            session_start();
            setcookie("language", $hash, 0, "/");
            $_SESSION["is_auth"] = TRUE ;

        }
    }

    public function get_cookie()
    {
        return $_COOKIE['language'];
    }

    public function is_auth()
    {
        $is_auth['chk'] = false ;
        $is_auth['src'] = "/images/lock.png" ;
        $is_auth['msg'] = "Пользователь не найден" ;

        if ($_SESSION["is_auth"]) {

            if (isset($_COOKIE['language'])) {
                $stmt = $this->db->prepare('SELECT hash, authtime FROM changeoffice WHERE hash = :hash');
                $stmt->bindValue(':hash', $_COOKIE['language']);
                $stmt->execute();
                $chk  = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($chk) {

                    if ( time() - $chk["authtime"] > 10 ) { 
                        $is_auth['chk'] = false ;
                        $is_auth['src'] = "/images/lock.png" ;
                        $is_auth['msg'] = "Сессия завершена" ;
                        setcookie("language","");
                    }
                    else {
                        $is_auth['chk'] = true ;
                        $is_auth['src'] = "/images/unlock.png" ;
                        $is_auth['msg'] = "" ;
                    }
                }
            }

        }
        return $is_auth;
    }

    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
    }

    function generate_hash($length = 10)
    {
        $chars     = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $len_chars = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[rand(0,$len_chars)];
        }
        return $code;
    }


}
?>