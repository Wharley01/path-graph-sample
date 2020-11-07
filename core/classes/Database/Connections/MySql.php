<?php
namespace Path\Core\Database\Connections;


use Path\Core\Error\Exceptions\Database;

/**
 *
 */


class MySql implements DB
{
    public $connection = null;
    private static $conn = null;

    public function __construct()
    {
    }

    public static function connection(){
        $HOST           = config("DATABASE->host");
        $USER           = config("DATABASE->user");
        $NAME           = config("DATABASE->name");
        $PASSWORD       = config("DATABASE->password");
        $CHARSET        = config("DATABASE->charset") ?? 'utf8mb4';
        if(self::$conn === null){
            try {
                $opt = [
                    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES   => false,
                ];
               
                self::$conn = new \PDO("mysql:host={$HOST};dbname={$NAME};charset={$CHARSET};", $USER, $PASSWORD,$opt);
                self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                register_shutdown_function(function (){
                    self::close();
                });
                return self::$conn;
            } catch (\PDOException $e) {
//                var_dump($e->getTrace());
                throw new Database($e->getMessage());
            }
        }elseif(self::$conn instanceof \PDO){
            return self::$conn;
        }

    }

    public static function disableKeyCheck(){
        $conn = self::$conn;
        if($conn instanceof \PDO)
            $conn->query("SET foreign_key_checks=0");

    }

    public static function enableKeyCheck(){
        $conn = self::$conn;
        if($conn instanceof \PDO)
            $conn->query("SET foreign_key_checks=1");

    }

    public static function close()
    {
        self::$conn = null;
    }
    public function __destruct()
    {
        $this->connection = null;
    }


}
