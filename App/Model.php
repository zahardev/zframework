<?php

namespace App;


class Model
{
    const TABLE = '';

    public static function fetchAll()
    {
        $db = Db::instance();
        $res = $db->getResults('SELECT * from ' . static::TABLE, static::class);
        return $res;
    }

    public static function findById($id)
    {
        $db = Db::instance();
        $query = 'SELECT * from `%s` WHERE id = %d';
        $query = sprintf($query, static::TABLE, $id);
        $res = $db->getResults($query, static::class);
        return empty($res[0]) ? false : $res[0];
    }
}