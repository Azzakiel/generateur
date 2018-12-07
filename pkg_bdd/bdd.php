<?php

/**
 * Created by PhpStorm.
 * User: berne
 * Date: 26/05/2017
 * Time: 13:30
 */
class bdd
{
    private $bdd_chaine;
    private $bdd_user;
    private $bdd_pass;

    public function __construct($bdd_host, $bdd_port, $bdd_dbname, $bdd_user, $bdd_pass)
    {
        $this->bdd_chaine = 'mysql:host='.$bdd_host.';port='.$bdd_port.';dbname='.$bdd_dbname;
        $this->bdd_user = $bdd_user;
        $this->bdd_pass = $bdd_pass;
    }

    private function connexion()
    {
        // Connexion à la base de données
        $db = new PDO($this->bdd_chaine, $this->bdd_user, $this->bdd_pass);
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