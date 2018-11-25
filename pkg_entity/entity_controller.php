<?php

/**
 * Created by PhpStorm.
 * User: Yael
 * Date: 09/06/2017
 * Time: 10:19
 */
class entity_controller
{
    //attribut privé de la classe
    //controller et model de la classe
    private $obj_entity_model;
    private $obj_entity_viewer;

    public function __construct($str_action = "")
    {
        $this->obj_entity_model = new entity_model();
        $this->obj_entity_viewer = new entity_viewer();
    }

    public function loadAllEntity($arr_obj_table)
    {
        $arr_obj_entity = $this->loadAttrEntity($arr_obj_table);
        $arr_obj_entity = $this->addGetterOnAllEntity($arr_obj_entity);
        $arr_obj_entity = $this->addSetterOnAllEntity($arr_obj_entity);
        return $arr_obj_entity;
    }

    private function loadAttrEntity ($arr_obj_table)
    {
        //TODO bloquer la génération de champ classique pouyr les élément déjà utilisé en temps que FK
        $arr_obj_entity = null;
        foreach ($arr_obj_table as $obj_table)
        {
             $obj_entity = new entity_entity();
             $arr_champ_entity = null;
             $obj_entity->setStrName("entity_".$obj_table->getStrName());
             $arr_champ_table = $obj_table->getArrChamp();
             $arr_fk_table = $obj_table->getArrFk();
             $arr_champ_temp = null;
             if ($arr_fk_table != null)
             {
                 foreach ($arr_fk_table as $key => $str_one_champ)
                 {
                     $arr_champ_entity[] = '$obj_'.$key.'_'. $str_one_champ;
                     $arr_champ_temp[] = $str_one_champ;
                 }
             }
             foreach ($arr_champ_table as $str_one_champ)
             {
                 $bool_test = true;
                 if ($arr_champ_temp != null)
                 {
                     foreach ($arr_champ_temp as $str_one_champ_temp)
                     {
                         if ($str_one_champ_temp == $str_one_champ)
                         {
                             $bool_test = false;
                         }
                     }
                 }
                 if ($bool_test == true)
                 {
                     $arr_champ_entity[] = '$' . $str_one_champ;
                 }
             }
             $obj_entity->setArrAttribut($arr_champ_entity);
             $arr_obj_entity[$obj_entity->getStrName()] = $obj_entity;
         }
         return $arr_obj_entity;
        }
        private function addGetterOnAllEntity ($arr_obj_entity)
        {
            //TODO ajouter getter

            return $arr_obj_entity;
        }
        private function addSetterOnAllEntity ($arr_obj_entity)
        {
            //TODO ajouter setter

            return $arr_obj_entity;
        }
}