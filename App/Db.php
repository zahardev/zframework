<?php
/**
 * Class for Db handling
 */

namespace App;


class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = Config::instance();
        $host = $config->data['db']['host'];
        $dbname = $config->data['db']['dbname'];
        $dbuser = $config->data['db']['dbuser'];
        $dbpassword = $config->data['db']['dbpassword'];

        $this->dbh = new \PDO("mysql:host={$host};dbname={$dbname}", $dbuser, $dbpassword);
    }

    public function exec($query, $args = [])
    {
        $query = vsprintf($query, $args);

        foreach ($args as $k => $v) {
            if(false !== strpos($query, $k)){
                $query = str_replace($k, "'$v'", $query);
            }
        }

        $sth = $this->dbh->prepare($query);
        $sth->execute();
        return $this->dbh->lastInsertId();
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