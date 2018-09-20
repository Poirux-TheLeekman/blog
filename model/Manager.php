<?php 
namespace Leekman\Blog\Model;

use ErrorException;

class Manager {
    // Connect to database
    protected function dbconnect()
    {
        try
        {
            $db = new \PDO('mysql:host=localhost;dbname=OCR_test;charset=utf8', 'test', 'test@Mysql');
            return $db;
        }
        catch(ErrorException $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}

   
