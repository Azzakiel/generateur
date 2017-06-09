<?php

/**
 * Created by PhpStorm.
 * User: Yael
 * Date: 09/06/2017
 * Time: 10:18
 */
class entity_entity
{
    //attribut privé de la classe
    private $str_name;
    private $arr_attribut;
    private $arr_getter;
    private $arr_setter;

    /**
     * @return mixed
     */
    public function getStrName()
    {
        return $this->str_name;
    }

    /**
     * @param mixed $str_name
     */
    public function setStrName($str_name)
    {
        $this->str_name = $str_name;
    }

    /**
     * @return mixed
     */
    public function getArrAttribut()
    {
        return $this->arr_attribut;
    }

    /**
     * @param mixed $arr_attribut
     */
    public function setArrAttribut($arr_attribut)
    {
        $this->arr_attribut = $arr_attribut;
    }

    /**
     * @return mixed
     */
    public function getArrGetter()
    {
        return $this->arr_getter;
    }

    /**
     * @param mixed $arr_getter
     */
    public function setArrGetter($arr_getter)
    {
        $this->arr_getter = $arr_getter;
    }

    /**
     * @return mixed
     */
    public function getArrSetter()
    {
        return $this->arr_setter;
    }

    /**
     * @param mixed $arr_setter
     */
    public function setArrSetter($arr_setter)
    {
        $this->arr_setter = $arr_setter;
    }



}