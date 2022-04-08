<?php
require_once(dirname(__FILE__) . './../data/provider/process.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relation client</title>
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
                    <li class="nav-item"><a class="nav-link" href="#listContact">Contacts</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">LogOut</a></li>
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
    <main class="container bg-light px-5">
        <div class="container bg-light py-5 px-3">
            <h1 class="fw-normal">Contacts</h1>
            <div class="cintactList">
                <div class="d-flex justify-content-between align-content-center">
                    <strong><a href="./../data/provider/contact.php"> Contacts List:</a></strong>
                    <div class="">
                        <a href="./" id="addContact" class="btn btn-primary">Add Contact</a>
                    </div>
                </div>

                <form id="form" action="./../data/provider/process.php" method="post" class="py-4 px-5 rounded-3 border border-dark p-3 bg-light container m-5 w-75 m-auto">
                    <div class="mb-3 d-flex justify-content-between align-content-center">
                        <div class="w-100 me-2 d-none">
                            <label for="id" class="form-label">id</label>
                            <input type="number" value="<?= $edit_id ?? '' ?>" name="id" class="form-control" id="id" placeholder="id">
                        </div>
                        <div class="w-100 me-2 d-flex align-item-center gap-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" value="<?= $edit_name ?? '' ?>" name="name" class="form-control" id="name" placeholder="name">
                        </div>
                        <div class="w-100 ms-2 d-flex align-item-center gap-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" value="<?= $edit_phone ?? '' ?>" name="phone" class="form-control" id="phone" placeholder="phone">
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-item-center gap-3">
                        <label for="mail" class="form-label d-flex align-item-center">Email:</label>
                        <input type="text" value="<?= $edit_email ?? '' ?>" name="email" class="form-control" id="email" placeholder="e-mail">
                    </div>
                    <div class="mb-3 d-flex align-item-center gap-3">
                        <label for="message" class="form-label">Message:</label>
                        <textarea name="message" cols="" rows="1" class="form-control" id="message" placeholder="message ..."><?php echo $edit_message ?? '' ?></textarea>
                    </div>
                    <div class="mb-0 text-center">
                        <?php if ($update) : ?>
                            <button type="submit" name='update' class="btn btn-warning w-50">Update</button>
                        <?php else : ?>
                            <button type="submit" name="save" class="btn btn-primary w-50">Save</button>
                        <?php endif ?>
                    </div>
                </form>

                <div id="listContact">
                    <p>No Contacts.</p>
                    <div class="list table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Message</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // print_r($myContacts);
                                foreach ($myContacts as $contact) {
                                ?>
                                    <tr>
                                        <td><?php echo $contact['name'] ?></td>
                                        <td><?= $contact['email'] ?></td>
                                        <td><?= $contact['phone'] ?></td>
                                        <td><?= $contact['message'] ?></td>
                                        <td class="d-flex gap-2">
                                            <a class="nav-link text-white btn btn-info" href="index.php?edit=<?= $contact['id'] ?>">Update</a>
                                            <a class="nav-link text-white btn btn-danger" href="./../data/provider/process.php?delete=<?= $contact['id'] ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div id="alertForm" class="d-none">
                    <form id="form" action="./../data/provider/process.php?type=add" method="post" class="py-4 px-5 rounded-3 border border-dark p-3 bg-light container m-5 w-75 m-auto">
                        <div class="mb-3 d-flex justify-content-between align-content-center">
                        <div class="w-100 me-2 d-none">
                                <label for="id" class="form-label">id</label>
                                <input type="number" name="id" class="form-control" id="id" placeholder="id">
                            </div>
                            <div class="w-100 me-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="name">
                            </div>
                            <div class="w-100 ms-2">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="phone">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="e-mail">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <textarea name="message" cols="" rows="3" class="form-control" id="message"
                                placeholder="message"></textarea>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary w-25">Save</button>
                            <button onclick="addContact()" type="button" class="btn btn-primary w-25">Close</button>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>