<?php
/**
 * Created by PhpStorm.
 * User: berne
 * Date: 08/06/2017
 * Time: 23:11
 */
include_once 'general_loader.php';
$obj_table_controller = new table_controller();
$arr_obj_table = $obj_table_controller -> getAllTable();
$obj_entity_controller = new entity_controller();
$arr_obj_entity = $obj_entity_controller->loadAllEntity($arr_obj_table);
echo "test GIT";
echo'<pre>';var_dump($arr_obj_entity);echo'</pre>';