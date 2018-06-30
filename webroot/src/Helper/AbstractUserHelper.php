<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 30.06.2018
 * Time: 17:57
 */

namespace App\Helper;


use App\Service\DBConn;

class AbstractUserHelper
{
    /** @var DBConn $db_conn */
    protected $db_conn;

    public function __construct(DBConn $DBConn)
    {
        $this->db_conn = $DBConn;
    }

    /**
     * Fügt neuen User hinzu mit seinen übergegebenen Daten.
     *
     * @param array $postData
     */
    public function insertUser(array $postData)
    {
        $sql = "
            INSERT INTO users (firstname, lastname, email, password, session_id)
            VALUES (:firstname, :lastname, :email, :password, :session_id)
        ";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute([
            'firstname' => $this->umlauteUmwandeln($postData['firstname'], 1),
            'lastname' => $this->umlauteUmwandeln($postData['lastname'], 1),
            'email' => $postData['email'],
            'password' => $postData['password'],
            'session_id' => $postData['session_id']
        ]);
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