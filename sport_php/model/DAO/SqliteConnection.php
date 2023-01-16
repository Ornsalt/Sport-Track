<?php
class SqliteConnection {
    private static $_instance = null;
    private PDO $pdo;

    private function __construct($dsn, $username=null, $password=null, $driver=null) {
        try {
            $this->pdo = new PDO($dsn, $username, $password, $driver);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            printf("Unable to connect:\n%s\n", $e->getMessage());
        }
    }
    
    public static function getInstance(): SqliteConnection {
        if (is_null(self::$_instance)) {
            self::$_instance = new SqliteConnection('sqlite:'.DB_FILE);
        }
        return (self::$_instance);
      }
   

    public function getConnection(): PDO {
        return ($this->pdo);
    }
}
?>