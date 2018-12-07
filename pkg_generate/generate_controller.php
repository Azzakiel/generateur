<?php

/**
 * Created by PhpStorm.
 * User: berne
 * Date: 08/06/2017
 * Time: 23:20
 */
class generate_controller
{

    private $obj_generate_model;
    private $obj_generate_viewer;

    public function __construct($str_action = "")
    {
        $this->obj_generate_model = new generate_model();
        $this->obj_generate_viewer = new generate_viewer();
    }
}