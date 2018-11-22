<?php
/**
 * Created by PhpStorm.
 * User: berne
 * Date: 05/06/2017
 * Time: 15:23
 */

session_start();
function autoload($classname)
{
    $cut_classname = explode('_', $classname)[0];
    require 'pkg_'.$cut_classname.'/'.$classname.'.php';
}

spl_autoload_register('autoload');