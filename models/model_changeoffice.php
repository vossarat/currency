<?php
class model_changeoffice extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_viewdata()
    {
        $stmt = $this->db->prepare('SELECT id, name, adress, geolocation FROM changeoffice');
        $stmt->execute();
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function index()
    {

        if ($_POST["view_changeoffice"]) {
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
    }

    public function add_changeoffice()
    {
        foreach ($_POST["form_data"] as $form_data) {
            $info_office[$form_data["name"]] = $form_data[value];
        }

        $stmt = $this->db->prepare('INSERT INTO changeoffice SET name = :name, adress = :adress, geolocation = :geolocation, login = :login, pass = :pass');
        $stmt->bindValue(':name', $info_office["name"]);
        $stmt->bindValue(':adress', $info_office["adress"]);
        $stmt->bindValue(':geolocation', $info_office["geolocation"]);
        $stmt->bindValue(':login', $info_office["login"]);
        $stmt->bindValue(':pass', $info_office["pass"]);
        $stmt->execute();

        echo "Инфо добавлена";
    }

    public function del_changeoffice()
    {
        $stmt = $this->db->prepare('DELETE FROM changeoffice WHERE id = :id');
        $stmt->bindValue(':id', $_POST["id"], PDO::PARAM_INT);
        $stmt->execute();
        
        echo "Запись с ID = $_POST[id] удалена";
    }

}
?>