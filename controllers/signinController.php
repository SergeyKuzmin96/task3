<?php
use models\User;
session_start();
require_once $_SESSION['path_autoload'];
require_once '../app/validation/signinValidate.php';

$data = $_POST;
$data = signinValidate($data);

if ($data['flag'] != 1) {
    unset($_SESSION['message']);

    $user = new User();
    if ($user->getUserByLogAndPas($data['login'], $data['password'])) {
        Header('Location: ../views/profileView.php');
    } else {
        $_SESSION['message'] = 'Не удаётся войти.Пожалуйста, проверьте правильность написания логина и пароля. ';
    }
}
Header('Location: ../views/authorizationView.php');


