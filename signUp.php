<?php
session_start();
require_once(dirname(__FILE__) . './data/provider/db.php');
$pro = new db();
$isloged = $pro->isLoged();
if ($isloged) {
    $pro->redirect("./profile/");
    die();
}
require_once(dirname(__FILE__) . './traitement.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="align-items-center text-white bg-<?= $_SESSION['type_msg'] ?> border-0 m-0 py-4 px-5">
            <div class="d-flex justify-content-between">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div class="text-center">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
                <a href="?" class="btn-close btn-close-white me-2 m-auto"></a>
            </div>
        </div>
    <?php endif  ?>
    <main class="m-5">
        <form action="./signUp.php" method="post" class="container m-5 w-50 m-auto">
            <div class="mb-3"><small id="status"></small></div>
            <div class="mb-3">
                <label for="username" class="form-label">User Name: <small class="invalidUsername"></small></label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Your username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: <small class="invalidEmail"></small></label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Your e-mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password: <small class="invalidPass"></small></label>
                <input type="password" name='password' class="form-control" id="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="validatePwd" class="form-label">Password Verify: <small class="invalidConfermePass"></small></label>
                <input type="password" name="validatePwd" class="form-control" id="validatePwd" placeholder="Password Verify">
            </div>
            <div class="mb-3">
                <button type="submit" name='save' class="btn btn-primary btn-block w-100">Sign Up</button>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <p>Already you have an acount? Sign In <a class="text-decoration-none" href="./signIn.php">Here.</a>
                </p>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="signUp.js"></script>
    <!-- S’il vous plaît s’assurer mot de passe répond aux exigences minimales: 8 à 30 caractères de longueur, ne pas répéter, au moins un supérieur, un inférieur, un caractère spécial (!@#$^&*) et un chiffre.
Le courriel de confirmation ne correspond pas. 
alert
Information!
Votre compte candidat a été créé avec succès. 
-->
</body>

</html>