<?php

/**
 * Created by PhpStorm.
 * User: berne
 * Date: 08/06/2017
 * Time: 23:26
 */
class table_entity
{

    //attribut privé de la classe
    private $str_name;
    private $arr_champ;
    private $arr_fk;

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
    public function getArrChamp()
    {
        return $this->arr_champ;
    }

    /**
     * @param mixed $arr_champ
     */
    public function setArrChamp($arr_champ)
    {
        $this->arr_champ = $arr_champ;
    }

    /**
     * @return mixed
     */
    public function getArrFk()
    {
        return $this->arr_fk;
    }

    /**
     * @param mixed $arr_fk
     */
    public function setArrFk($arr_fk)
    {
        $this->arr_fk = $arr_fk;
    }

}