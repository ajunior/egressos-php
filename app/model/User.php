<?php

class User {
    private $pdo;
    public $err = "";

    public function connect($host, $db, $user, $passwd) {
        global $pdo;
        global $config;

        try {
            $pdo = new PDO("mysql:dbname".$config['db_name'].";host=".$config['db_host'], $config['db_user'], $config['db_password']);
        } catch (Exception $e) {
            $err = $e->getMessage();
        }
    }

    public function isLogged() {
        isset($_SESSION['user']) && !empty($_SESSION['user']) ? true : false;
    }

    public function login($email, $password) {
        global $pdo;

        $sql = $pdo->prepare("SELECT user_id FROM USERS WHERE email = :email AND password  = :passwd;");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":passwd", md5($password));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            return true;
        }

        return false;
    }
}