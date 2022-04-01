<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestions des relation client CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="m-0 p-0 w-full ">
    <header class="header">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Mes Contacts</a>
                <ul class="d-flex">
                    <li class="nav-item"><a class="nav-link" href="signIn.html">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link" href="signUp.html">Sign Up</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container bg-light p-5">
        <div class="container bg-light py-5 px-3">
            <h1 class="fw-normal">Contacts</h1>
            <div class="cintactList">
                <div class="d-flex justify-content-between align-content-center">
                    <strong><a href="./../data/provider/contact.php"> Contacts List:</a></strong>
                    <div class="">
                        <button onclick="addContact()" id="addContact" class="btn btn-primary">Add Contact</button>
                    </div>
                </div>
                <div id="listContact">
                    <p>No Contacts.</p>
                    <div class="list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hasnaoui said</td>
                                    <td>hasnaoui@gmail.com</td>
                                    <td>+2126423456</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td class="d-flex flex-column"><a href="#">Update</a><a href="#">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form id="form" action="./signIn.html" method="post" class="d-none container m-5 w-75 m-auto">
                    <div class="mb-3 d-flex justify-content-between align-content-center">
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
                        <input type="text" name="mail" class="form-control" id="mail" placeholder="e-mail">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <textarea name="message" cols="" rows="3" class="form-control" id="message"
                            placeholder="message"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="button" type="submit" class="btn btn-primary btn-block w-100">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script>
        function addContact() {
            document.getElementById('form').classList.toggle('d-none')
            document.getElementById('listContact').classList.toggle('d-none')
        }
    </script>

</body>

</html>