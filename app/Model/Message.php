<?php
namespace Gongongo\Model;

use \Gongongo\Helper\Cache;

class Message
{
    public static function all()
    {
        $cashier = Cache::getInstance();
        $messages = $cashier->get(self::cacheKey());

        if ($messages === false) {
            $messages = array();
        }

        return $messages;
    }

    public static function save($text)
    {
        $cashier = Cache::getInstance();
        $messages = $cashier->get(self::cacheKey());

        if ($messages === false) {
            $messages = array();
        }

        array_unshift(
            $messages,
            array(
                'text' => $text,
                'date' => time()
            )
        );

        $cashier->set(self::cacheKey(), $messages);
    }

    private static function cacheKey()
    {
        return __NAMESPACE__ . __CLASS__;
    }
}