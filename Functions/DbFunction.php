<?php
/**
 * Database class
 * For one point of database access
 */
class Database
{
    /**
     * User name to connect to database
     * @var string $_mysqlUser
     */
    private static $_mysqlUser = 'php24sql';
    /**
     * Password to connect to database
     * @var string $_mysqlPass
     */
    private static $_mysqlPass = 'hJQV8RTe5t';
    /**
     * Database name
     * @var string $_mysqlDb
     */
    private static $_mysqlDb = 'smithside';
    /**
     * Hostname for the server
     * @var string $_hostName
     */
    private static $_hostName = 'localhost';
    /**
     * Database connection
     * @var Mysqli $connection
     */
    private static $_connection = NULL;

    /**
     * Constructor
     */
    private function __construct(){
    }

    /**
     * Get the Database Connection
     *
     * @return Mysqli
     */
    public static function getConnection() {
        if (!self::$_connection) {
            self::$_connection = @new mysqli(self::$_hostName, self::$_mysqlUser, self::$_mysqlPass, self::$_mysqlDb);
            if (self::$_connection->connect_error) {
                die('Connect Error: ' . self::$_connection->connect_error);
            }
        }
        return self::$_connection;
    }

    public static function prep($value) {
        if (MAGIC_QUOTES_ACTIVE) {
            // If magic quotes is active, remove the slashes
            $value = stripslashes($value);
        }
        // Escape special characters to avoid SQL injections
        $value = self::$_connection->real_escape_string($value);
        return $value;
    }

}
