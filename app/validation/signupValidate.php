<?php
use models\User;
session_start();
require_once 'clearData.php';
require_once 'fullNameValidate.php';
require_once 'passwordValidate.php';

function signupValidate($data): array
{
    $data = clearData($data);
    $full_name = $data['full_name'];
    $login = $data['login'];
    $email = $data['email'];
    $password = $data['password'];
    $password_confirm = $data['password_confirm'];

    $flag = 0;

    if (fullNameValidate($full_name) === false) {
        $flag = 1;
    }

    if (empty($login)) {
        $_SESSION['loginError'] = 'Поле не может быть пустым';
        $flag = 1;
    } else {
        if (mb_strlen($login) <= 10) {
            $user = new User();
            if ($user->checkUserByLog($login)) {
                $_SESSION['loginError'] = 'Данный логин уже занят';
                $flag = 1;
            }

        } else {
            $_SESSION['loginError'] = 'Логин должен быть не больше 10 символов';
            $flag = 1;
        }

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError'] = 'Формат Email не верный!';
        $flag = 1;
    }
    if (empty($email)) {
        $_SESSION['emailError'] = 'Поле не может быть пустым';
        $flag = 1;
    }

    if (newPasswordValidate($password, $password_confirm) === false) {
        $flag = 1;
    }

    $data['flag'] = $flag;
    return $data;
}
