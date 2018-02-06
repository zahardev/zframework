<?php

namespace App\Models;

use App\Db;
use \App\Model;

class News extends Model
{
    const TABLE = 'news';

    public $id;
    public $title;
    public $content;
    public $date;

    public static function getLastNews(string $order = 'DESC', int $offset = 0, int $limit = 5)
    {
        try {
            $db = Db::instance();

            $orders = ['ASC', 'DESC'];

            if ( ! in_array($order, $orders)) {
                throw new \Exception('$order can be only DESC or ASC');
            }

            $query = 'SELECT * FROM `%s` ORDER BY `date` %s LIMIT %d, %d';
            $query = sprintf($query, static::TABLE, $order, $offset, $limit);

            $res = $db->getResults($query, static::class);
            return $res;
        } catch (\Exception $e) {
            echo __METHOD__.$e;
            return [];
        }
    }
}