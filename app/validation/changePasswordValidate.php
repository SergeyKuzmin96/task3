<?php
session_start();
require_once 'clearData.php';
require_once 'passwordValidate.php';

function changePasswordValidate($data): array
{
    $data = clearData($data);
    $password = $data['password'];
    $new_password = $data['new_password'];
    $new_password_confirm = $data['new_password_confirm'];
    $flag = 0;

    if (userPasswordValidate($password) === false) {
        $flag = 1;
    }
    if (newPasswordValidate($new_password, $new_password_confirm) === false) {
        $flag = 1;
    }

    $data['flag'] = $flag;
    return $data;
}