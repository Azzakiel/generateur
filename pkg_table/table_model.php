<?php

/**
 * Created by PhpStorm.
 * User: berne
 * Date: 08/06/2017
 * Time: 23:26
 */
class table_model
{
    public function loadAllTable()
    {
        //charge les nom de toutes les tables de la bdd
        $obj_bdd = new bdd();
        $str_query = 'SHOW tables';
        $arr_result = $obj_bdd->query($str_query);
        $arr_obj_table = null;
        //parcour les résultats pour en tiré des objet table complet
        if (isset($arr_result))
        {
            foreach ($arr_result as $arr_one_table)
            {
                $obj_table = new table_entity();
                $obj_table->setStrName($arr_one_table[0]);
                //apres avoir récupéré le nom de la table, on en extrait les nom des champs
                $str_query = 'SHOW COLUMNS FROM '.$obj_table->getStrName();
                $arr_result_champ = $obj_bdd->query($str_query);
                $arr_table_champ = null;
                foreach ($arr_result_champ as $arr_one_champ)
                {
                    $arr_table_champ[] = $arr_one_champ['Field'];
                }
                $obj_table->setArrChamp($arr_table_champ);
                //apres les champ on récupère les foreign key
                $str_query = 'SHOW INDEX FROM '.$obj_table->getStrName();
                $arr_result_fk = $obj_bdd->query($str_query);
                $arr_table_fk = null;
                foreach ($arr_result_fk as $arr_one_fk)
                {
                    if ($arr_one_fk['Non_unique'] == 1)
                    {
                        $arr_table_fk[] = $arr_one_fk['Column_name'];
                    }
                }
                $obj_table->setArrFk($arr_table_fk);
                $arr_obj_table[] = $obj_table;
            }
        }
        return $arr_obj_table;
    }
}