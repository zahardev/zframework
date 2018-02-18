<?php

namespace App\Models;

use App\Db;
use \App\Model;
use App\MultiException;

/**
 * Class News
 * @package App\Models
 */
class News extends Model
{
    /**
     *
     */
    const TABLE = 'news';

    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $content;
    /**
     * @var
     */
    public $date;
    /**
     * @var
     */
    public $author_id;


    /**
     * @param string $order
     * @param int $offset
     * @param int $limit
     *
     * @return array
     */
    public static function getLastNews(string $order = 'DESC', int $offset = 0, int $limit = 5)
    {
        try {
            $db = Db::instance();

            $orders = ['ASC', 'DESC'];

            if ( ! in_array($order, $orders)) {
                throw new \App\Exceptions\Model('$order can be only DESC or ASC');
            }

            $query = 'SELECT * FROM `%s` ORDER BY `date` %s LIMIT %d, %d';
            $query = sprintf($query, static::TABLE, $order, $offset, $limit);

            $res = $db->getResults($query, static::class);
            return $res;
        } catch (\App\Exceptions\Model $e) {
            echo __METHOD__ . $e;
            return [];
        }
    }

    /**
     * @param $name
     *
     * @return Authors|null
     */
    public function __get($name)
    {
        if('author'==$name){
            if($this->author_id){
                if(empty($this->author)){
                    $this->author = Authors::findById($this->author_id);
                }
            } else {
                $this->author = null;
            }
            return $this->author;
        }
        return null;
    }


    public function beforeSave()
    {
        $errors = MultiException::instance(); /** @var MultiException $errors */
        //Do some validation:
        if(empty($this->title)){
            $errors[] = 'Please specify title';
        }

        if(empty($this->description)){
            $errors[] = 'Please specify description';
        }

        if($errors){
            throw $errors;
        }
    }
}