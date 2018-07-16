<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 17.07.2018
 * Time: 01:45
 */

namespace App\Helper;

use App\Service\DBConn;

class AnnounceHelper
{
    /** @var DBConn $db_conn */
    protected $db_conn;

    public function __construct(DBConn $DBConn)
    {
        $this->db_conn = $DBConn;
    }
}