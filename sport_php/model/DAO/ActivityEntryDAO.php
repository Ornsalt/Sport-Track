<?php
require_once(MOD_DIR.'/DAO/SqliteConnection.php');
require_once(MOD_DIR.'/OBJ/Data.php');

class ActivityEntryDAO {
    private static ActivityEntryDAO $dao;

    private function __construct() {
    }

    public static function getInstance(): ActivityEntryDAO {
        if (!isset(self::$dao)) {
            self::$dao = new ActivityEntryDAO();
        }
        return (self::$dao);
    }

    final public function findAll(): Array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $stmt = $dbc->query("SELECT * FROM Data ORDER BY actId, date, time;");
        return ($stmt->fetchALL(PDO::FETCH_CLASS, 'Data'));
    }

    final public function findActivityEntries(int $id): Array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $stmt = $dbc->query("SELECT * FROM Data WHERE actId == :id;");
        
        // bind the paramaters
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return ($stmt->fetchALL(PDO::FETCH_CLASS, 'Data'));
    }

    final public function insert(Data $st): void{
        if ($st instanceof Data) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("INSERT INTO Data(actId, time, cardio, coordX, coordY, coordZ) VALUES (:id, :t, :c, :x, :y, :z);");

            // bind the paramaters
            $stmt->bindValue(':id', $st->getActId(), PDO::PARAM_INT);
            $stmt->bindValue(':t', $st->getTime(), PDO::PARAM_STR);
            $stmt->bindValue(':c', $st->getCardio(), PDO::PARAM_STR);
            $stmt->bindValue(':x', $st->getCoordX(), PDO::PARAM_STR);
            $stmt->bindValue(':y', $st->getCoordY(), PDO::PARAM_STR);
            $stmt->bindValue(':z', $st->getCoordZ(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    public function delete(Data $obj): void {
        if ($obj instanceof Data) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("DELETE FROM Data WHERE actId == :id AND time == :time;");

            // bind the paramaters
            $stmt->bindValue(':id', $obj->getActId(), PDO::PARAM_INT);
            $stmt->bindValue(':Time', $obj->getTime(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    public function update(Data $obj): void {
        if ($obj instanceof Data) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("UPDATE Activity SET actId = :id, time = :t, cardio = :c, coordX = :x, coordY = :y, coordY = :z WHERE actId == :id AND time == :time;");

            // bind the paramaters
            $stmt->bindValue(':id', $obj->getActId(), PDO::PARAM_INT);
            $stmt->bindValue(':t', $obj->getTime(), PDO::PARAM_STR);
            $stmt->bindValue(':c', $obj->getCardio(), PDO::PARAM_STR);
            $stmt->bindValue(':x', $obj->getCoordX(), PDO::PARAM_STR);
            $stmt->bindValue(':y', $obj->getCoordY(), PDO::PARAM_STR);
            $stmt->bindValue(':z', $obj->getCoordZ(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }
}
?>