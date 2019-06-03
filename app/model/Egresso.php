<?php

require_once 'config.php';

class Egresso {
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

    public function listaEgressos() {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM egressos;");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $egressos = $sql->fetch();

            return $egressos;
        }
    }
}
