<?php

use models\User;

session_start();
require_once $_SESSION['path_autoload'];
require_once '../app/validation/signupValidate.php';

$data = $_POST;
$data = signupValidate($data);
if ($data['flag'] == 1) {
    $_SESSION['full_name'] = $data['full_name'];
    $_SESSION['login'] = $data['login'];
    $_SESSION['email'] = $data['email'];
} else {
    unset($_SESSION['full_name']);
    unset($_SESSION['login']);
    unset($_SESSION['email']);

    $user = new User();
    $user->setFullName($data['full_name']);
    $user->setLogin($data['login']);
    $user->setEmail($data['email']);
    $user->setPassword($data['password']);

    $user->saveUser();
    $_SESSION['message'] = 'Registration was successful!';
}
Header('Location: ../views/authorizationView.php');
