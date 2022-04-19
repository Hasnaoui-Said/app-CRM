<?php
session_start();
require_once(dirname(__FILE__) . './data/provider/db.php');
$pro = new db();
$isloged = $pro->isLoged();
if ($isloged) {
    $pro->redirect("./listContact/");
    die();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST);
    if (!empty($username) && !empty($password)) {
        require_once('./data/provider/user.php');
        $pepper = "c1isvFdxMDdmjOlvxpecFw";
        $pwd_peppered = hash_hmac("sha256", $password, $pepper);
        $user = new User($username, '', $pwd_peppered);
        $isExist = $user->getUserByUsernameAndPassword();
        if ($isExist != null) {
            date_default_timezone_set('UTC');
            $_SESSION['auth'] = array(
                'session_gc_lifetime' => time(),
                'password' => $pwd_peppered,
                'id' => $isExist['id'],
                'username' => $isExist['username'],
                'signUpDate' => $isExist['signUpDate'],
                'LastUpDate' => date(DATE_RFC2822),
            );
            $status = '';
            print_r($_SESSION['auth']);
            header('location: ./profile/');
            die();
        } else {
            $status = 'Username Or password incorrect';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <header class="header">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Mes Contacts</a>
                <ul class="d-flex">
                    <li class="nav-item"><a class="nav-link" href="signIn.php">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link" href="signUp.php">Sign Up</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="m-5">
        <form action="signIn.php" method="POST" class="container m-5 w-50 m-auto">
            <?php
            if (isset($status) && !empty($status)) {
            ?>
                <div class="mb-3 text-center">
                    <small class="alert alert-danger"><?= $status ?></small>
                </div>
            <?php
            }
            ?>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Your username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <p>Don't have an acount? Sign Up <a class="text-decoration-none" href="./signUp.php">Here.</a></p>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>