<?php
/**
 * Created by PhpStorm.
 * User: berne
 * Date: 08/06/2017
 * Time: 23:11
 */
include_once 'general_loader.php';
$test = new table_controller();
$arr_obj_table = $test -> getAllTable();
echo'<pre>';var_dump($arr_obj_table);echo'</pre>';