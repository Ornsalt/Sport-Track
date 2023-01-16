<?php
require_once(MOD_DIR.'/DAO/SqliteConnection.php');
require_once(MOD_DIR.'/OBJ/User.php');

class UserDAO {
    private static UserDAO $dao;

    private function __construct() {
    }

    public static function getInstance(): UserDAO {
        if(!isset(self::$dao)) {
            self::$dao = new UserDAO();
        }
        return (self::$dao);
    }

    public final function findAll(): Array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $stmt = $dbc->query("SELECT * FROM User ORDER BY name, lastName;");
        return ($stmt->fetchALL(PDO::FETCH_CLASS, 'User'));
    }

    public final function insert(User $st): void{
        if ($st instanceof User) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("INSERT INTO User(name, lastName, birthDay, sex, height, weight, email, passWord) VALUES (:n, :l, :b, :s, :h, :w, :e, :p);");

            // bind the paramaters
            $stmt->bindValue(':n', $st->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':l', $st->getLastName(), PDO::PARAM_STR);
            $stmt->bindValue(':b', $st->getBirthDay(), PDO::PARAM_STR);
            $stmt->bindValue(':s', $st->getSex(), PDO::PARAM_STR);
            $stmt->bindValue(':h', $st->getHeight(), PDO::PARAM_STR);
            $stmt->bindValue(':w', $st->getWeight(), PDO::PARAM_STR);
            $stmt->bindValue(':e', $st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':p', $st->getPassWord(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    public function delete(User $obj): void {
        if ($obj instanceof User) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("DELETE FROM User WHERE name == :n AND lastName == :l AND birthDay == :b;");

            // bind the paramaters
            $stmt->bindValue(':n', $obj->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':l', $obj->getLastName(), PDO::PARAM_STR);
            $stmt->bindValue(':b', $obj->getBirthDay(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    public function update(User $obj): void {
        if ($obj instanceof User) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("UPDATE User SET name = :n, lastName = :l, birthDay = :b, sex = :s, height = :h, weight = :w, email = :e, passWord = :p WHERE id == :i;");

            // bind the paramaters
            $stmt->bindValue(':i', $obj->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':n', $obj->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':l', $obj->getLastName(), PDO::PARAM_STR);
            $stmt->bindValue(':b', $obj->getBirthDay(), PDO::PARAM_STR);
            $stmt->bindValue(':s', $obj->getSex(), PDO::PARAM_STR);
            $stmt->bindValue(':h', $obj->getHeight(), PDO::PARAM_STR);
            $stmt->bindValue(':w', $obj->getWeight(), PDO::PARAM_STR);
            $stmt->bindValue(':e', $obj->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':p', $obj->getPassWord(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        }
    }

    public function getId(user $obj): int {
        if ($obj instanceof User) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $stmt = $dbc->prepare("SELECT id FROM User WHERE email == :e;");

            // bind the paramaters
            $stmt->bindValue(':e', $obj->getEmail(), PDO::PARAM_STR);

            // execute the prepared statement
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                print($e->getMessage());
            }
            return ((!($res = $stmt->fetch())) ? -1 : $res[0]);
        }
    }

    public function getUser(String $mail, string $mdp): ?user {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $user = new User();

        // prepare the SQL statement
        $stmt = $dbc->prepare('SELECT * FROM User WHERE email == :mail AND passWord == :mdp;');

        // bind the paramaters
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindValue(':mdp', $mdp, PDO::PARAM_STR);

        // execute the prepared statement
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            print($e->getMessage());
        }
        if (!($res = $stmt->fetch())) {
            $user = null;
        } else {
            $user->init($res['id'], $res['name'], $res['lastName'], $res['birthDay'], $res['sex'], $res['height'], $res['weight'], $res['email'], $res['passWord']);
        }
        return ($user);
    }
}
?>