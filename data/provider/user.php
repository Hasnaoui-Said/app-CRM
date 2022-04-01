<?php
    require_once(dirname(__FILE__) .'./db.php');
    class User extends Db{
        public function setUser($username, $email, $password){

            $db = $this->connect();
            
            if($db == null){
                return;
            }

            $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
            $smt = $db->prepare($sql);

            $smt->execute(
                [
                    ":username"=> $username,
                    ":email"=> $email,
                    ":password"=> $password,
                ]
            );

            $smt = null;
            $db = null;
        }

        public function getUsers(){

            $db = $this->connect();

            if($db == null){
                return;
            }

            $query = $db->query('SELECT * FROM user');

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            $query = null;
            $db = null;

            return $data;
        }
    }
    // $user = new User();
    // $user->setUser('hamid', 'hamid@gmail.com', 'hamid');
    $user = new User();
    print_r($user->getUsers());

?>