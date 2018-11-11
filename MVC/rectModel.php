<?php

class rectModel
{
    // create user instance
    private static $connection;

    function connect()
    {
        $dsn = 'mysql:host=localhost;dbname=cmpt470';
        $username = 'rishi';
        $password = 'rishi';
        $options = [];

        try {
            self::$connection = new PDO($dsn, $username, $password, $options);

            $sql = 'CREATE DATABASE IF NOT EXISTS cmpt470; ';
            $statement = self::$connection->prepare($sql);
            if ($statement->execute()) {
                $message = 'data inserted successfully';
            }


            $sql = '  CREATE TABLE IF NOT EXISTS rectangle(
                        width INT,
                        height  INT,
                        color VARCHAR(20),
                        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
);

    ';
            $statement = self::$connection->prepare($sql);
            if ($statement->execute()) {
                $message = 'data inserted successfully';
            } else {

            }


        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } // connecting to DB

    function read($rect)
    {

    }

    function resetDB()
    {
        //todo get previous values if null
        $sql = 'Truncate table rectangle';
        $statement = self::$connection->prepare($sql);
        if ($statement->execute()) {
        } else {
        }
    }

    function add($width, $height, $color)
    {

        $sql = 'INSERT INTO rectangle(width,height,color) VALUES(:width, :height, :color)';
        $statement = self::$connection->prepare($sql);
        if ($statement->execute([':width' => $width, ':height' => $height, ':color' => $color])) {
            $message = 'data inserted successfully';
        }

    }

    function update($id, $width, $height, $color)
    {
//todo get previous values if null
        $sql = 'UPDATE rectangle SET width=:width, height=:height,color=:color WHERE id=:id';
        $statement = self::$connection->prepare($sql);
        if ($statement->execute([':width' => $width, ':height' => $height, ':color' => $color, ':id' => $id])) {
        } else {
        }
    }

    function delete($id)
    {
        $sql = 'DELETE FROM rectangle WHERE id=:id';
        $statement = self::$connection->prepare($sql);
        if ($statement->execute([':id' => $id])) {
            header("Location: main.php");
        }
    }

    function getAllRects()
    {
        $sql = 'SELECT * FROM rectangle';
        $statement = self::$connection->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);

    }

    function disconnect()
    {

    } // disconnects DB

}

?>