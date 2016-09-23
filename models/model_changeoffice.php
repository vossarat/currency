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
		
		$current_ai = $this->get_ai();
		
        echo "<tr>
        <td><input type=\"radio\" name=\"id\" value=$current_ai/></td>
        <td>$info_office[name]</td>
        <td>$info_office[adress]</td>
        <td>$info_office[geolocation]</td></tr>";
    }

    public function del_changeoffice()
    {
        $office_info = $this->get_office_info($_POST["id"]);
        $stmt        = $this->db->prepare('DELETE FROM changeoffice WHERE id = :id');
        $stmt->bindValue(':id', $_POST["id"], PDO::PARAM_INT);
        $stmt->execute();
        
        echo "Запись по пункту $office_info[name] удалена";
    }

    public function edit_changeoffice()
    {
        return $this->get_office_info($_POST["id"]);
    }
    
    public function get_office_info($id)
    {
        $stmt = $this->db->prepare('SELECT name FROM changeoffice WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_ai()
    {
        $stmt    = $this->db->query("SHOW TABLE STATUS LIKE 'changeoffice'");
        $current_ai = $stmt->fetch(PDO::FETCH_ASSOC);
		return $current_ai["Auto_increment"]-1;
    }



}
?>