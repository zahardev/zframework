<?php

namespace App;


class Model
{
    const TABLE = '';

    public static function fetchAll()
    {
        $db = new Db();
        $res = $db->getResults('SELECT * from ' . static::TABLE, static::class);
        return $res;
    }

    public static function findById($id)
    {
        $db = new Db();
        $query = 'SELECT * from `%s` WHERE id = %d';
        $query = sprintf($query, static::TABLE, $id);
        $res = $db->getResults($query, static::class);
        return empty($res) ? false : $res;
    }
}