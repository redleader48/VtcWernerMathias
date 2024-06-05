<?php
class Connection
{

    public function getConnect()
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=vtc", "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
        return $db;
    }
}
