<?php
use models\User;
session_start();
require_once '../app/validation/changePasswordValidate.php';
require_once $_SESSION['path_autoload'];

$data = $_POST;
$data = changePasswordValidate($data);

if ($data['flag'] == 0) {
    $user = new User();
    $user->setLogin($_SESSION['user']['login']);
    $user->setPassword($data['new_password']);

    $user->updatePassword();
    $_SESSION['message_change_pass'] = 'Password changed successfully!';
}
Header('Location: ../views/changePersonalDataView.php');