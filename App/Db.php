<?php
/**
 * Class for Db handling
 */

namespace App;


class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=zframework', 'root', '123');
    }

    public function exec($query, $args = [])
    {
        $query = vsprintf($query, $args);
        $dbh = $this->dbh->prepare($query);
        $res = $dbh->execute();
        return $res;
    }

    public function getResults($query, $class, $args = [])
    {
        $query = vsprintf($query, $args);
        $dbh   = $this->dbh->prepare($query);
        $res   = $dbh->execute();
        if (false !== $res) {
            return $dbh->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}