<?php
use models\User;
session_start();

function userPasswordValidate($password): bool
{
    if (!empty($password)) {

        $user = new User();
        if ($user->checkUserByLogAndPass($_SESSION['user']['login'], $password) !== false) {
            return true;
        } else {
            $_SESSION['passwordError'] = 'Неверный пароль';
            return false;
        }
    } else {
        $_SESSION['passwordError'] = 'Поле не может быть пустым';
        return false;
    }
}

function newPasswordValidate($new_password, $new_password_confirm): bool
{
    $result = true;

    if (empty($new_password)) {
        $_SESSION['newPasswordError'] = 'Поле не может быть пустым';
        $result = false;
    }
    if (mb_strlen($new_password) < 6 && !empty($new_password)) {
        $_SESSION['newPasswordError'] = 'Минимальная длинна пароля - 6 символов';
        $result = false;
    }

    if (empty($new_password_confirm)) {
        $_SESSION['passwordConfirmError'] = 'Поле не может быть пустым';
        $result = false;
    }
    if ($new_password !== $new_password_confirm) {
        $_SESSION['passwordConfirmError'] = 'Пароли не совпадают';
        $result = false;
    }

    return $result;
}