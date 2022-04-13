<?php
namespace models;
use app\DB;

class User
{
    private $id;
    private $full_name;
    private $login;
    private $email;
    private $password;

    public $connect;

    public function __construct()
    {
        $db = new DB;
        $this->connect = $db->getConnection();
    }

    //Метод сохранения пользователя в БД
    public function saveUser()
    {
        mysqli_query($this->connect, "INSERT INTO `users` (`full_name`,`login`, `email`, `password`) VALUES ('$this->full_name','$this->login', '$this->email', '$this->password')");
    }

    //Метод получения пользователя из БД
    public function getUserByLogAndPas($login, $password): bool
    {
        $data = self::checkUserByLogAndPass($login, $password);
        if ($data !== false) {
            self::setId($data['id']);
            self::setFullName($data['full_name']);
            self::setLogin($data['login']);

            $_SESSION['user'] = [
                "id" => $data['id'],
                "full_name" => $data['full_name'],
                "login" => $data['login'],
                "email" => $data['email'],

            ];
            return true;
        }
        return false;
    }

    //Метод проверки наличия пользователя в бд по логину и паролю
    public function checkUserByLogAndPass($login, $password)
    {
        $password = md5($password);
        $check_user = mysqli_query($this->connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        if (mysqli_num_rows($check_user) > 0) {
            return mysqli_fetch_assoc($check_user);
        }
        return false;
    }
    //Метод проверки наличия пользователя в бд по логину
    public function checkUserByLog($login): bool
    {
       if(mysqli_num_rows(mysqli_query($this->connect, "SELECT * FROM `users` WHERE `login` = '$login'")) > 0){
           return true;
       }
       return false;
    }

    //Метод для изменения у пользователя ФИО
    public function updateFullName()
    {
        mysqli_query($this->connect, "UPDATE `users` SET `full_name` = '$this->full_name' WHERE `login` = '$this->login'");
        $_SESSION['user']['full_name'] = $this->full_name;
    }

    //Метод для изменения у пользователя пароля
    public function updatePassword()
    {
        mysqli_query($this->connect, "UPDATE  `users` SET `password` = '$this->password' WHERE `login` = '$this->login'");
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
    }


}