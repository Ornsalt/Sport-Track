<?php
require_once(MOD_DIR.'/DAO/SqliteConnection.php');
require_once(MOD_DIR.'/OBJ/Activity.php');


class ActivityDAO {
    private static ActivityDAO $dao;

    private function __construct() {
    }

    public static function getInstance(): ActivityDAO {
        if(!isset(self::$dao)) {
            self::$dao = new ActivityDAO();
        }
        return (self::$dao);
    }

    public final function findAll(): array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $stmt = $dbc->query("SELECT * FROM Activity ORDER BY userId, date;");

        return ($stmt->fetchALL(PDO::FETCH_CLASS, 'Activity'));
    }

    public final function findFromId(int $id): array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $stmt = $dbc->query("SELECT * FROM Activity WHERE userId == :id;");
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return ($stmt->fetchALL(PDO::FETCH_CLASS, 'Activity'));
    }

    public final function insert(Activity $st): void {
        if ($st instanceof Activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("INSERT INTO Activity(userId, date, description, start, duration, cardMin, cardAvg, cardMax) VALUES (:id, :date, :desc, :s, :dur, :min, :avg, :max);");

            // bind the paramaters
            $stmt->bindValue(':id', $st->getUserId(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':desc', $st->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':s', $st->getStart(), PDO::PARAM_STR);
            $stmt->bindValue(':dur', $st->getDuration(), PDO::PARAM_STR);
            $stmt->bindValue(':min', $st->getCardMin(), PDO::PARAM_STR);
            $stmt->bindValue(':avg', $st->getCardAvg(), PDO::PARAM_STR);
            $stmt->bindValue(':max', $st->getCardMax(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    public function delete(Activity $obj): void {
        if ($obj instanceof Activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("DELETE FROM Activity WHERE userId == :id AND date == :date AND description == :desc;");

            // bind the paramaters
            $stmt->bindValue(':id', $obj->getuserId(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $obj->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':desc', $obj->getDescription(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    public function update(Activity $obj): void {
        if ($obj instanceof Activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("UPDATE Activity SET userId = :id, date = :date, description = :desc, start = :s, duration = :dur, cardMin = :min, cardAvg = :avg, cardMax = :max WHERE userId == :id AND date == :date AND description == :desc;");

            // bind the paramaters
            $stmt->bindValue(':id', $obj->getUserId(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $obj->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':desc', $obj->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':s', $obj->getStart(), PDO::PARAM_STR);
            $stmt->bindValue(':dur', $obj->getDuration(), PDO::PARAM_STR);
            $stmt->bindValue(':min', $obj->getCardMin(), PDO::PARAM_STR);
            $stmt->bindValue(':avg', $obj->getCardAvg(), PDO::PARAM_STR);
            $stmt->bindValue(':max', $obj->getCardMax(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    final public function findMaxId(): Array {
        $stmt = SqliteConnection::getInstance()->getConnection()->query(
            "SELECT id FROM Activity WHERE id = (SELECT max(id) FROM Activity)");

        return ($stmt->fetchALL(PDO::FETCH_CLASS, 'Activity'));
    }
}
?>