<?php
session_start();
require_once(dirname(__FILE__) . './db.php');
$pro = new db();
$isloged = $pro->isLoged();
if (!$isloged) {
    $pro->redirect("./../");
    die();
}
require_once(dirname(__FILE__) . './contact.php');

$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    extract($_POST);
    if (isset($_POST['save'])) {
        if (!empty($name) && !empty($phone)) {
            $nowContact = new Contact();
            $nowContact->setName($name);
            $nowContact->setPhone($phone);
            $nowContact->setMessage($message);
            $nowContact->setEmail($email);
            print_r($nowContact);
            $nowContact->addContact();
            $_SESSION['message'] = 'Contact has benn saved';
            $_SESSION['type_msg'] = 'success';
            header('location: ./../../listContact/');
        }
    } else if (isset($_POST['update'])) {
        if (!empty($name) && !empty($phone)) {
            $nowContact = new Contact();
            $nowContact->setId($id);
            $nowContact->setName($name);
            $nowContact->setPhone($phone);
            $nowContact->setMessage($message);
            $nowContact->setEmail($email);
            $nowContact->updateContactById();
            $_SESSION['message'] = 'Contact has benn update';
            $_SESSION['type_msg'] = 'info';
            header('location: ./../../listContact/');
        }
    } else if (isset($_GET['edit'])) {
        $nowContact = new Contact();
        $nowContact->setId($_GET['edit']);
        $my_contact = $nowContact->findContactById();
        $update = true;
        $edit_email = $my_contact[0]['email'];
        $edit_id = $my_contact[0]['id'];
        $edit_phone = $my_contact[0]['phone'];
        $edit_name = $my_contact[0]['name'];
        $edit_message = $my_contact[0]['message'];
    } else if (isset($_GET['delete'])) {
        $nowContact = new Contact();
        $nowContact->setId($_GET['delete']);
        $my_contact = $nowContact->deleteContactById();
        $_SESSION['message'] = 'Contact has benn deleted';
        $_SESSION['type_msg'] = 'danger';
        header('location: ./../../listContact/');
    }
}
$contact = new Contact();
$myContacts = $contact->findAllContactsByIdUser();
