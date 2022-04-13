<?php
session_start();
require_once 'clearData.php';
require_once 'passwordValidate.php';
require_once 'fullNameValidate.php';

function changeFullNameValidate($data): array
{
    $data = clearData($data);
    $password = $data['password'];
    $new_full_name = $data['new_full_name'];

    $flag = 0;

    if (fullNameValidate($new_full_name) === false) {
        $flag = 1;
    }
    if (userPasswordValidate($password) === false) {
        $flag = 1;
    }

    $data['flag'] = $flag;
    return $data;
}