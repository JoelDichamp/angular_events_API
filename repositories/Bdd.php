<?php
class Bdd {

    const DSN = "mysql:dbname=events_ws;host=localhost";
    const USER = "root";
    const PASSWORD = "TReiZe_13-LuPiN_813";
    const CONFIG = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    private $pdo;

    function __construct() {
        try {
            $this->pdo = new PDO( self::DSN, self::USER, self::PASSWORD, self::CONFIG );
        }
        catch ( PDOException $e ) {
            echo "Connexion à la base de données impossible : " . $e->getMessage();
            die();
        }
    }

    function getPdo() {
        return $this->pdo;
    }
}