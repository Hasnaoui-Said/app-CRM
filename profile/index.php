<?php
require_once(dirname(__FILE__) . './../data/provider/process.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Mon profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="m-0 p-0 w-full ">
    <header class="header">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Mes Contacts</a>
                <ul class="d-flex">
                    <li class="nav-item"><a class="nav-link" href="#"><?= $_SESSION['auth']['username'] ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="./../listContact/">Contacts</a></li>
                    <li class="nav-item"><a class="nav-link" href="./../listContact/logout.php">LogOut</a></li>
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
                <a href='./' class="btn-close btn-close-white me-2 m-auto"></a>
            </div>
        </div>
    <?php endif  ?>
    <main class="container bg-light p-5">
        <h1 class="text-capitalize">Welcome <?= $_SESSION['auth']['username']  ?> </h1>
        <div class="">Your Profile</div>
        <hr>
        <div class="d-flex gap-50 mt-1">
            <strong class="w-25">Username:</strong>
            <p class="w-50 text-capitalize"><?= $_SESSION['auth']['username']  ?> </p>
        </div>
        <hr>
        <div class="d-flex gap-50 mt-1">
            <strong class="w-25">Signup date:</strong>
            <p class="w-50 text-capitalize"><?php
                                            $date = new DateTime($_SESSION['auth']['signUpDate']);
                                            echo $date->format(DATE_RFC2822);  ?> </p>
        </div>
        <hr>
        <div class="d-flex gap-50 mt-1">
            <strong class="w-25">Last login:</strong>
            <p class="w-50 text-capitalize"><?= $_SESSION['auth']['LastUpDate'] ?> </p>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>