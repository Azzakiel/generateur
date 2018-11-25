<?php

/**
 * Created by PhpStorm.
 * User: berne
 * Date: 25/11/2018
 * Time: 17:04
 */
class class_loader
{
    /**
     * class_loader constructor.
     * initialize la session et lance le register
     */
    public function __construct()
    {
        session_start();
        $this->register();
    }

    /**
     * Enregistre l'autoloader
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * @param $classname : nom de la classe à charger
     * charge les classes des packages créés sous la forme pkg_maclasse/maclasse.php
     * on enleve le _controller ou autre pour retrouver le nom du package et garder tout de meme le nom complet de
     * toutes les classes du package
     */
    static function autoload($classname)
    {
        $cut_classname = explode('_', $classname)[0];
        require 'pkg_'.$cut_classname.'/'.$classname.'.php';
    }
}