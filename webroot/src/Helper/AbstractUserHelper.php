<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 30.06.2018
 * Time: 17:57
 */

namespace App\Helper;


use App\Service\DBConn;
use Symfony\Component\HttpFoundation\Request;

class AbstractUserHelper
{
    /** @var DBConn $db_conn */
    protected $db_conn;

    public function __construct(DBConn $DBConn)
    {
        $this->db_conn = $DBConn;
    }

    /**
     * Fügt einen User hinzu.
     *
     * @param array $postData
     * @return bool
     */
    public function insertUser(array $postData): bool
    {
        $sql = "
            INSERT INTO users (firstname, lastname, email, password)
            VALUES (:firstname, :lastname, :email, :password)
        ";
        $statement = $this->db_conn->prepare($sql);
        try {
            $statement->execute([
                'firstname' => $this->umlauteUmwandeln($postData['firstname'], 1),
                'lastname' => $this->umlauteUmwandeln($postData['lastname'], 1),
                'email' => $postData['email'],
                'password' => $postData['password'],
            ]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * Holt die id des Users, wenn es die schon existiert.
     *
     * @param string $email
     * @return int
     */
    public function isEmailAvailable(string $email): int
    {
        $statement = $this->db_conn->prepare("SELECT id FROM users WHERE email = :email");
        $statement->execute([
           'email' => $email
        ]);
        return $statement->rowCount();
    }

    /**
     * Wandelt Umlaute um oder andersrum genau so.
     * Wichtig für Datenbank!
     *
     * @param string $var
     * @param int $type
     * @return string
     */
    protected function umlauteUmwandeln(string $var, int $type): string
    {
        $umlauteZuNormal = [
            "Ä" => "AE",
            "Ö" => "OE",
            "Ü" => "UE",
            "ä" => "ae",
            "ö" => "oe",
            "ü" => "ue"
        ];
        $normalZuUmlaut = [
            "Ä" => "AE",
            "Ö" => "OE",
            "Ü" => "UE",
            "ä" => "ae",
            "ö" => "oe",
            "ü" => "ue"
        ];
        return $type == 1 ? strtr($var, $umlauteZuNormal) : strtr($var, $normalZuUmlaut);
    }
}