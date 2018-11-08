<?php

class userModel {
    // create user instance
    private static $connection;
    function connect(){
        $dsn = 'mysql:host=localhost;dbname=cmpt470';
        $username = 'rishi';
        $password = 'rishi';
        $options = [];

        try{
            self::$connection = new PDO($dsn,$username,$password,$options);
            //echo 'connection successful';
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    } // connecting to DB

    function read($rect){

    }
    function getConn(){
        return self::$connection;
    }

    function add($rect){
            $message = '';

            $width = $rect->getWidth();
            $height = $rect->getHeight();
            $color = $rect->getColor();
            $sql = 'INSERT INTO rectangle(width, height, color) VALUES(:width, :height, :color)';
            $statement = self::$connection->prepare($sql);
            if ($statement->execute([':width' => $width, ':height' => $height, ':color' => $color])) {
                $message = 'data inserted successfully';
                echo $message;
            }

    }

    function update($rect){

    }

    function delete($rect){

    }

    function readAllUsers(){

    }

    function disconnect(){

    } // disconnects DB

}
?>