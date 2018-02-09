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

    /**
     *
     * @param $id
     *
     * @return Model|false
     */
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


    public function update()
    {
        if ( $this->isEmpty()) {
            return false;
        }

        $updates = [];

        foreach ($this as $k => $v) {
            if('id'==$k){
                continue;
            }

            $updates[] = "$k = '$v'";
        }

        $query = 'UPDATE `%s` SET %s WHERE id=%d';
        $query = sprintf(
            $query,
            static::TABLE,
            implode(',', $updates),
            $this->id
        );

        /**@var Db $db */
        $db = Db::instance();
        $this->id = $db->exec($query);

        return $this;
    }

    public function save()
    {
        if($this->isEmpty()){
            return $this->insert();
        } else {
            return $this->update();
        }
    }

    public function delete()
    {
        if(!$this->isEmpty()){
            $query = 'DELETE FROM `' . static::TABLE . '` WHERE id=:id';
            $db = Db::instance();
            $args = [':id' => $this->id];

            $db->exec($query, $args);
        }

        unset($this);
    }
}