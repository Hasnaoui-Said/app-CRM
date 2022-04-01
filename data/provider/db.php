<?php
require_once(dirname(__FILE__) .'./config.php');

class Db{

    public function connect(){
        try{
            return new PDO(CONFIG['db'], CONFIG['db_user'], CONFIG['db_password']);
        }catch(PDOException $e){
            return null;
        }
    }
    public function redirect($page){
        header("location: $page");
    }
    public function isLoged(){
        if(isset($_SESSION['auth']['session_gc_lifetime'])){
            if(time() - $_SESSION['auth']['session_gc_lifetime'] > 3600 * 24){
                session_unset();
                session_destroy();
                return false;
            }
        }
        return (
            isset($_SESSION['auth']) &&
            isset($_SESSION['auth']['email']) &&
            isset($_SESSION['auth']['pass']) &&
            (time() - $_SESSION['auth']['session_gc_lifetime'] < 3600 * 24)
        );
    }
}

?>
