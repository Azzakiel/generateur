<?php
/**
 * Created by PhpStorm.
 * User: berne
 * Date: 08/06/2017
 * Time: 23:11
 */
include_once 'class_loader.php';
new class_loader();
//TODO mise en palce d'un interface permettant à l'utilisateur de renseigner ces varaibles
$_SESSION['host'] = '127.0.0.1';
$_SESSION['port'] = '3306';
$_SESSION['dbname'] = 'cv';
$_SESSION['user'] = 'root';
$_SESSION['pass'] = 'root';
$obj_table_controller = new table_controller();
$arr_obj_table = $obj_table_controller -> getAllTable();
$obj_entity_controller = new entity_controller();
$arr_obj_entity = $obj_entity_controller->loadAllEntity($arr_obj_table);
echo'<pre>';var_dump($arr_obj_entity);echo'</pre>';