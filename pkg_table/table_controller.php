<?php

/**
 * Created by PhpStorm.
 * User: berne
 * Date: 08/06/2017
 * Time: 23:26
 */
class table_controller
{

    //attribut privé de la classe
    //controller et model de la classe
    private $obj_table_model;
    private $obj_table_viewer;

    public function __construct($str_action = "")
    {
        $this->obj_table_model = new table_model();
        $this->obj_table_viewer = new table_viewer();
    }

    public function getAllTable()
    {
        $arr_table = $this->obj_table_model->loadAllTable();
        return $arr_table;
    }
}