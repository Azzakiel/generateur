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
        // TODO adapter l'utilisation de l'objet BDD a sa nouvel forme
        $obj_bdd = new bdd($_SESSION['host'], $_SESSION['port'], $_SESSION['dbname'], $_SESSION['user'], $_SESSION['pass']);
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
                    $arra_type = explode("(", $arr_one_champ['Type']);
                    if ($arra_type[0] == "varchar")
                    {
                        $arra_type[0] = "str";
                    }
                    $arr_table_champ[] = $arra_type[0]."_".$arr_one_champ['Field'];
                }
                $obj_table->setArrChamp($arr_table_champ);
                //apres les champ on récupère les foreign key dans un tableau : objet de référence => item qui est clé étrangère dans l'objet courant
                $str_query = 'select COLUMN_NAME, REFERENCED_TABLE_NAME from information_schema.KEY_COLUMN_USAGE where CONSTRAINT_NAME != \'PRIMARY\' AND TABLE_NAME = "'.$obj_table->getStrName().'" AND REFERENCED_TABLE_NAME is NOT null';
                $arr_result_fk = $obj_bdd->query($str_query);
                $arr_table_fk = null;
                foreach ($arr_result_fk as $arr_one_fk)
                {
                    $arr_table_fk[$arr_one_fk['REFERENCED_TABLE_NAME']] = $arr_one_fk['COLUMN_NAME'];
                }
                $obj_table->setArrFk($arr_table_fk);
                $arr_obj_table[] = $obj_table;
            }
        }
        return $arr_obj_table;
    }
}

