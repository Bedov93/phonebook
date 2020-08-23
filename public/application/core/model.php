<?php

class Model
{
    /**
     * @param $query запрос
     * @param $type тип возвращаемого значения
     * @return array|bool
     */
    public function query($query,$type = MYSQLI_ASSOC)
    {
        return Database::query($query,$type);
    }

    public function exec($query){
        return Database::exec($query);
    }

    public function fetchOne($query,$type = MYSQLI_ASSOC)
    {
        return Database::fetchOne($query,$type);
    }
    public function get_data()
    {
    }
}
