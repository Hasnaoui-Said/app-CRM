<?php
require_once(dirname(__FILE__) . './db.php');
class Contact extends Db
{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $message;
    public $userId;
    public function addContact()
    {

        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = "INSERT INTO contact (name, email, phone, message, user_id) VALUES (:name, :email, :phone, :message, :user_id)";
        $smt = $db->prepare($sql);

        echo '<br>-----_SESSION-------' . $_SESSION['auth']['id'] . '------f-----<br>';
        echo '<br>-------name-----' . $this->name . '------f-----<br>';
        echo '<br>-------email-----' . $this->email . '-----f------<br>';
        echo '<br>--------phone----' . $this->phone . '-------f----<br>';
        echo '<br>--------message----' . $this->message . '-----f------<br>';
        $smt->execute(
            [
                ":name" => $this->name,
                ":email" => $this->email,
                ":phone" => $this->phone,
                ":message" => $this->message,
                ":user_id" => $_SESSION['auth']['id']
            ]
        );

        $smt = null;
        $db = null;
    }

    public function findAllContactsByIdUser()
    {

        $db = $this->connect();

        if ($db == null) {
            return;
        }
        $query = 'SELECT * FROM contact WHERE user_id = :id';

        $smt = $db->prepare($query);
        $smt->execute([
            ":id" => $_SESSION['auth']['id'],
        ]);

        $data = $smt->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
        $db = null;

        return $data;
    }
    public function findContactById()
    {

        $db = $this->connect();

        if ($db == null) {
            return;
        }
        $query = 'SELECT * FROM contact WHERE id = :id';

        $smt = $db->prepare($query);
        $smt->execute([
            ":id" => $this->id,
        ]);

        $data = $smt->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
        $db = null;

        return $data;
    }
    function updateContactById()
    {
        $db = $this->connect();
        if ($db == null) return;
        $query = 'UPDATE contact 
                SET id = :id, name = :name, email = :email, phone = :phone, message = :message 
                WHERE id = :id';
        $smt = $db->prepare($query);
        $smt->execute([
            ":id" => $this->id,
            ":name" => $this->name,
            ":phone" => $this->phone,
            ":email" => $this->email,
            ":message" => $this->message
        ]);
        $db = null;
        $smt = null;
    }
    function deleteContactById()
    {

        $db = $this->connect();
        if ($db == null) return;
        $query = 'DELETE FROM contact WHERE id = :id';
        $smt = $db->prepare($query);
        $smt->execute([
            ":id" => $this->id
        ]);
        $query = null;
        $db = null;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
    // $contact = new Contact();
    // $contact->setContact('nasser', 'nasser@gmail.com', '+21287986545', 'my friends', 14);
    // $contacts = $contact->getContactsById(14);
