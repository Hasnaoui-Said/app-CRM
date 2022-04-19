<?php
require_once(dirname(__FILE__) . './db.php');
class User extends Db
{
    private $username;
    private $email;
    private $password;
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    public function register()
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
        $smt = $db->prepare($sql);

        $smt->execute(
            [
                ":username" => $this->username,
                ":email" => $this->email,
                ":password" => $this->password
            ]
        );

        $smt = null;
        $db = null;
    }

    public function getUsers()
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $query = $db->query('SELECT * FROM user');

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = null;
        $db = null;

        return $data;
    }
    function getUserByUsernameAndPassword()
    {
        $db = $this->connect();

        if ($db == null) return null;

        $query = 'SELECT * FROM user WHERE username = :username AND password = :password';
        $smt = $db->prepare($query);

        $smt->execute([
            ':username' => $this->username,
            ':password' => $this->password,
        ]);


        $data = $smt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        $smt = null;
        if (count($data) == 0) return null;
        return $data[0];
    }
    function getUserByUsername()
    {
        $db = $this->connect();

        if ($db == null) return;

        $query = 'SELECT * FROM user WHERE username = :username ';
        $smt = $db->prepare($query);

        $smt->execute([
            'username' => $this->username,
        ]);


        $data = $smt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        $smt = null;
        if (count($data) == 0) return null;
        return $data;
    }
}
    // $user->setUser('hamid', 'hamid@gmail.com', 'hamid');
    // $user = new User();
    // if($user->getUserByUsername('said') == null) echo 'null';
    // else echo 'not null';
    // print_r($user->getUsers());
