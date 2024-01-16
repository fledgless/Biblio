<?php

abstract class ConnexionManager {
    private static $connexion;

    public static function setConnexionDbb() {
        self::$connexion = new PDO("mysql:host=$_ENV[MYSQL_HOST];dbname=$_ENV[MYSQL_DATABASE];chartset=utf8", $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
        self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getConnexionDbb() {
        if( self::$connexion === null ) {
            self::setConnexionDbb();
        }
        return self::$connexion;
    }
}

