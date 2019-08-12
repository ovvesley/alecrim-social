<?php

class DatabaseManager {
    //a class with all methods to work with database

    private static $host = "localhost";
    private static  $user = "vvesley";
    private static $password = "1334";
    private static $database = "HairBook";
    private static $connection;

    public static function try_connection() : bool {
        //tries to open connection
        self::$connection = mysqli_connect(self::$host, self::$user, self::$password);

        if (!self::$connection) {
            return false; //if it fails
        }

        return true; //if connection was opened
    }

    public static function select_and_query_database(string $sql) : void {
        //if the select fails
        if (!mysqli_select_db(self::$connection, self::$database)) {
            echo "<p>Error</p>";
            mysqli_close(self::$connection);
            die();
        }

        //putting data in database
        $answer = mysqli_query(self::$connection, $sql);

        if (!$answer) {
            echo "<p>Error</p>";
            die();
        }

        //header("location:...");
    }

    public static function user_email_exist(string $email) : bool {
        $answer = mysqli_query(self::$connection, "select * from Usuario");

        if ($answer) {
            $line = mysqli_fetch(assoc($answer));

            while ($line) {
                if ($line["email"] == $email) {
                    return true;
                }
                $line = mysqli_fetch(assoc($answer));
            }
        }
        return false;
    }

    public static function close_connection() : void {
        mysqli_close(self::$connection);
    }

    public static function header_session(string $error, string $location) : void {
        $_SESSION["error"] = $error;
        header($location);
    } 
}