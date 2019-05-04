<?php


class Connection {

    public static function make($config) {

        try {

            return new PDO( //New database object receiving values from config.php file

                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']

            );
        
        } 
        catch(PDOException $e) {
            
            die($e->getMessage());
        
        } 

    }

}