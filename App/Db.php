<?php
/**
 * Class for Db handling
 */

namespace App;


use App\Exceptions\DbException;

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

        try {
            $this->dbh = new \PDO("mysql:host={$host};dbname={$dbname}", $dbuser, $dbpassword);
        } catch (\PDOException $e){
            throw new DbException($e->getMessage(), $e->getCode());
        }
    }

    public function exec($query, $args = [])
    {
        foreach ($args as $k => $v) {
            if(false !== strpos($query, $k)){
                $value = ( NULL === $v ) ? 'NULL' : "'$v'";
                $query = str_replace($k, $value , $query);
            }
        }

        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            return $this->dbh->lastInsertId();
        } catch (\PDOException $e){
            throw new DbException($e->getMessage(), $e->getCode());
        }
    }

    public function getResults($query, $class, $args = [])
    {
        try {
            $query = vsprintf($query, $args);
            $dbh   = $this->dbh->prepare($query);
            $res   = $dbh->execute();
            if (false !== $res) {
                return $dbh->fetchAll(\PDO::FETCH_CLASS, $class);
            }
            return [];
        } catch (\PDOException $e){
            throw new DbException($e->getMessage(), $e->getCode());
        }
    }
}