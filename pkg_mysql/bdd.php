<?php

/**
 * Created by PhpStorm.
 * User: berne
 * Date: 26/05/2017
 * Time: 13:30
 */
class bdd
{
    private function connexion()
    {
        // Connexion à la base de données
        $db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=cv', 'root', 'root');
        return $db;
    }
    public function query ($str_requete)
    {
        $db = $this->connexion();
        $select = $db->prepare($str_requete);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }

    //TODO insert delete update ...
}