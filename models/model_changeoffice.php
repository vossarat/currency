<?php
class model_changeoffice extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	
        $this -> msg = '';
        
        if ($_POST["add_changeoffice"]) //Добавляем новый пункт обмена
        {
            if ($_POST["name"] == "")
            {
                $err = $err."Заполните наименование<br>";
                $this->msg = $err;
            }
            if (strip_tags($err) == "")
            {
                $this -> add_changeoffice();
            }
        }

        if ($_POST["edit_changeoffice"]) //Редактируем информацию по пункту обмена
        {
            $stmt = $this->db->prepare('UPDATE changeoffice SET name = :name, adress = :adress, geolocation = :geolocation, login = :login, pass = :pass WHERE id = :id');
            $stmt->bindValue(':name', $_POST["name"]);
            $stmt->bindValue(':adress', $_POST["adress"]);
            $stmt->bindValue(':geolocation', $_POST["geolocation"]);
            $stmt->bindValue(':login', $_POST["login"]);
            $stmt->bindValue(':pass', $_POST["pass"]);
            $stmt->bindValue(':id',$_POST["id"], PDO::PARAM_INT);
            $stmt->execute();
        }

        if ($_POST["btn_submit"] == "Редактировать") {
            $stmt = $this->db->prepare('SELECT id, name, adress, geolocation, login, pass FROM changeoffice WHERE id = :id');
            $stmt->bindValue(':id', $_POST["id"], PDO::PARAM_INT);
            $stmt->execute();
            $_POST= $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if ($_POST["btn_submit"] == "Удалить") {
            $stmt = $this->db->prepare('DELETE FROM changeoffice WHERE id = :id');
            $stmt->bindValue(':id', $_POST["id"], PDO::PARAM_INT);
            $stmt->execute();
        }
        return $this -> msg;
    }

    public function get_viewdata()
    {
        $stmt = $this->db->prepare('SELECT id, name, adress, geolocation FROM changeoffice');
        $stmt->execute();
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function add_changeoffice()
    {
        /*$stmt = $this->db->prepare('INSERT INTO changeoffice SET name = :name, adress = :adress, geolocation = :geolocation, login = :login, pass = :pass');
        $stmt->bindValue(':name', $_POST["name"]);
        $stmt->bindValue(':adress', $_POST["adress"]);
        $stmt->bindValue(':geolocation', $_POST["geolocation"]);
        $stmt->bindValue(':login', $_POST["login"]);
        $stmt->bindValue(':pass', $_POST["pass"]);
        $stmt->execute();*/
        echo "<pre>";
			print_r($_POST["form_data"]);
		echo "</pre>";  
    }
    
}
?>