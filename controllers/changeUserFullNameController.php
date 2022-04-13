<?php
use models\User;
session_start();
require_once '../app/validation/changeFullNameValidate.php';
require_once $_SESSION['path_autoload'];

$data = $_POST;
$data = changeFullNameValidate($data);

if ($data['flag'] === 0) {
    $user = new User();
    $user->setFullName($data['new_full_name']);
    $user->setLogin($_SESSION['user']['login']);

    $user->updateFullName();
    $_SESSION['message_change_fn'] = 'Full name changed successfully!';
}
Header('Location: ../views/changePersonalDataView.php');