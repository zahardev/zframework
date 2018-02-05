<?php

namespace App;


class Model
{
    const TABLE = '';

    public $id;

    public static function fetchAll()
    {
        $db  = Db::instance();
        $res = $db->getResults('SELECT * from '.static::TABLE, static::class);
        return $res;
    }

    public static function findById($id)
    {
        $db    = Db::instance();
        $query = 'SELECT * from `%s` WHERE id = %d';
        $query = sprintf($query, static::TABLE, $id);
        $res   = $db->getResults($query, static::class);
        return empty($res[0]) ? false : $res[0];
    }

    public function isEmpty()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if ( ! $this->isEmpty()) {
            return false;
        }

        $columns = $values = [];

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
        }

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $values[':'.$k] = $v;
        }

        $query = 'INSERT INTO `%s` (%s) VALUES (%s)';
        $query = sprintf(
            $query,
            static::TABLE,
            implode(', ', $columns),
            implode(', ', array_keys($values))
        );

        /**@var Db $db */
        $db = Db::instance();
        $this->id = $db->exec($query, $values);

        return $this;
    }
}