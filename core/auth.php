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
        $stmt->bindParam(':login', $_POST['login']);
        $stmt->bindParam(':pass', $_POST['pass']);//md5(md5($_POST['pass'])));
        $stmt->execute();
        $auth_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $auth_data ) {
            $hash      = $this->generate_hash(10);
            $stmt_hash = $this->db->prepare('UPDATE changeoffice SET hash=:hash, authtime=:loging_time WHERE id = :id');
            $stmt_hash->bindParam(':id', $auth_data['id']);
            $stmt_hash->bindParam(':hash', $hash);
            $stmt_hash->bindParam(':loging_time', date("Y-m-d H:i:s"));
            $stmt_hash->execute();

            session_start();
            setcookie("language", $hash, time() + 1440);
            $_SESSION["is_auth"] = TRUE ;
        }

    }

    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();

    }

    public function is_auth()
    {
        $is_auth = FALSE ;
        if ($_SESSION["is_auth"]) {
        	
            if (isset($_COOKIE['language'])) {
                $stmt = $this->db->prepare('SELECT hash, authtime FROM changeoffice WHERE hash = :hash');
                $stmt->bindParam(':hash', $_COOKIE['language']);
                $stmt->execute();
                $chk = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<pre>";
					print_r($_COOKIE['language']);
				echo "</pre>";

                if ($chk) {
                    $is_auth = TRUE ;
                }
            }
            return $is_auth;
        }

    }

    function generate_hash($length = 10)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $len_chars  = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[rand(0,$len_chars)];
        }
        return $code;
    }
}
?>