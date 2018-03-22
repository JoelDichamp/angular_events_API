<?php
abstract class Repository {

    protected $pdo;

        function __construct( $pdo ) {
            //on appelle le singleton de la bdd
            $this->pdo = $pdo;
        }
}