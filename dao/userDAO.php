<?php namespace dao;

use dao\Connection as Connection;
use dao\Singleton as Singleton;
use model\User as User;
use interfaces\ICrud as ICrud;

class UserDAO extends Singleton
{
    protected $table = "users"; /* se agregar para el dia de mañana modificar una vez el nombre de la tabla */
    private $connection;

    //object factoryDao

    public function __construct () {
        $this->pdo = new Connection();
    }

    public function create (User $user) {
        $sql = 'INSERT INTO users (role_user, username, pass, email, name_user, surname, dni, profile_picture) VALUES (:role_user,:username,:pass,:email,:name_user,:surname,:dni,:profile_picture) ';

        $params['role_user'] = $user->getRoleUser();
        $params['username'] = $user->getUsername();
        $params['pass'] = $user->getPass();
        $params['email'] = $user->getEmail();
        $params['name_user'] = $user->getNameUser();
        $params['surname'] = $user->getSurname();
        $params['dni'] = $user->getDni();
        $params['profile_picture'] = $user->getProfilePicture();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $params);
        } catch (\PDOException $e) {
            throw $e;
        }
    }


    /**
     * @param $username
     * @return User || boolean
     */
    public function read ($username) {
        $sql = 'SELECT * FROM users WHERE username = :username';

        $params['username'] = $username;


        try {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $params);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        if (!empty($resultSet))
            return $this->mapMethod($resultSet);
        else
            return false;
    }


    public function readByUsernameOrEmail ($userOrEmail) {
        try {
            $query = "SELECT * FROM $this->table WHERE username = :user OR email = :email";

            $connection = $this->pdo->connect();
            $statement = $connection->prepare($query);

            $statement->execute([
                ":user" => $userOrEmail["user"],
                ":email" => $userOrEmail["email"]
            ]);

            if ($statement->rowCount() > 0) {
                return true;
            }

            return false;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }


    /**
     * @param $value
     * @return array
     */
    public function mapMethod ($value) {

        $value = is_array($value) ? $value : [$value];

        $resp = array_map(function ($p) {
            return new User(
                $p['id_user'],
                $p['username'],
                $p['pass'],
                $p['email'],
                $p['name_user'],
                $p['surname'],
                $p['dni'],
                $p['profile_picture']
            );
        }, $value);

        return count($resp) > 1 ? $resp : $resp[0];

    }


}//class end
