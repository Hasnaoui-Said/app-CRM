<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    extract($_POST);
    if (!empty($username) && !empty($password) && !empty($validatePwd)) {
        if ($password === $validatePwd) {
            require_once('./data/provider/user.php');
            $pepper = "c1isvFdxMDdmjOlvxpecFw";
            $pwd_peppered = hash_hmac("sha256", $password, $pepper);
            $user = new User($username, $email, $pwd_peppered);
            $isExist = $user->getUserByUsername();
            if ($isExist == null) {
                $user->register();
                $_SESSION['message'] = 'Compte has benn created';
                $_SESSION['type_msg'] = 'success';
            } else {
                $_SESSION['message'] = 'Username already exist';
                $_SESSION['type_msg'] = 'info';
            }
        } else {
            $_SESSION['message'] = 'Password invalid';
            $_SESSION['type_msg'] = 'warning';
        }
    } else {
        $_SESSION['message'] = 'Usernae or password is required';
        $_SESSION['type_msg'] = 'info';
    }
}
