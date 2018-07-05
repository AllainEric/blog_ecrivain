<?php

namespace JeanForteroche\Blog\Model;

class Manager
{
    protected function dbConnect()
    {

        $db = new \PDO('mysql:host=;dbname=blog_ecrivain;charset=utf8', '','', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_EMULATE_PREPARES=>FALSE));
        error_reporting(E_ALL);
        return $db;
    }
}
