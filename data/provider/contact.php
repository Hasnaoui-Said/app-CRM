<?php
    require_once(dirname(__FILE__) .'./db.php');
    class Contact extends Db{
        public function setContact($name, $email, $phone, $message, $user_id){

            $db = $this->connect();
            
            if($db == null){
                return;
            }

            $sql = "INSERT INTO contact (name, email, phone, message, user_id) VALUES (:name, :email, :phone, :message, :user_id)";
            $smt = $db->prepare($sql);

            $smt->execute(
                [
                    ":name"=> $name,
                    ":email"=> $email,
                    ":phone"=> $phone,
                    ":message"=> $message,
                    ":user_id"=> $user_id
                ]
            );

            $smt = null;
            $db = null;
        }

        public function getContacts(){

            $db = $this->connect();

            if($db == null){
                return;
            }

            $query = $db->query('SELECT * FROM contact');

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            $query = null;
            $db = null;

            return $data;
        }
        public function getContactsById($id){

            $db = $this->connect();

            if($db == null){
                return;
            }
            $query = 'SELECT * FROM contact WHERE user_id = :id';

            $smt = $db->prepare($query);
            $smt->execute([
                ":id"=> $id,
            ]);

            $data = $smt->fetchAll(PDO::FETCH_ASSOC);
            $query = null;
            $db = null;

            return $data;
        }
    }
    $contact = new Contact();
    // $contact->setContact('nasser', 'nasser@gmail.com', '+21287986545', 'my friends', 14);
    $contacts = $contact->getContactsById(14);
    echo 'list des contacts <br>';
    print_r($contacts);
    echo  "<br>------------------------------";
    echo  "<br>------------------------------";
    echo  "<br>fin"

?>