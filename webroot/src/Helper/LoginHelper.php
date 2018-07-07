<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 07.07.2018
 * Time: 17:56
 */

namespace App\Helper;

use App\Service\DBConn;

class LoginHelper
{
    /** @var DBConn $db_conn */
    protected $db_conn;

    public function __construct(DBConn $DBConn)
    {
        $this->db_conn = $DBConn;
    }

    /**
     * Prüft, ob User in der Datenbank ist und gibt die Anzahl der verfügbaren Zeilen zurück.
     * Rückgabewert sollte, wenn User gefunden ist immer eine 1 sein oder 0 wenn es keinen User gibt.
     *
     * @param array $postData
     * @return bool
     */
    public function isUserAvailable(array $postData): bool
    {
        $sql = "SELECT id FROM users WHERE email = :email AND password = :password";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute([
           'email' => $postData['email'],
           'password' => $postData['password']
        ]);
        return $statement->rowCount() > 0 ? true : false;
    }
}