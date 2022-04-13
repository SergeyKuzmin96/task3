<?php
session_start();

$_SESSION['path_autoload'] = dirname(__DIR__).'/vendor/autoload.php';
if ($_SESSION['user']) {
    header('Location: ..\views\profileView.php');
}else{
    header('Location: ..\views\authorizationView.php');

}