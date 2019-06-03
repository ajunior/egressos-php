<?php

class User {
    private $pdo;
    public $err = "";

    public function connect() {
        global $pdo;
        global $config;

        try {
            $pdo = new PDO("mysql:dbname=".$config['db_name'].";host=".$config['db_host'], $config['db_username'], $config['db_password']);
        } catch (PDOException $e) {
            $err = $e->getMessage();
        }
    }

    public function isLogged() {
        isset($_SESSION['userid']) && !empty($_SESSION['userid']) ? true : false;
    }

    public function login($email, $password) {
        global $pdo;

        $sql = $pdo->prepare("SELECT user_id FROM users WHERE email = :email AND passwd  = :passwd;");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":passwd", md5($password));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            session_start();
            $_SESSION['userid'] = $data['user_id'];

            return true;
        }

        return false;
    }
}