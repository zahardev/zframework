<?php

namespace App;


class Model
{
    const TABLE = '';

    public static function fetchAll()
    {
        $db = new Db();
        $res = $db->getResults('SELECT * from ' . static::TABLE, self::class);
        return $res;
    }
}