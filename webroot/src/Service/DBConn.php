<?php
/**
 * Created by PhpStorm.
 * User: yigit-can.duendar
 * Date: 05.02.2018
 * Time: 08:28
 */

namespace App\Service;

use Symfony\Component\Yaml\Yaml;

class DBConn extends \PDO
{
    /**
     * DBConn constructor.
     * @param string $file yaml file with database configurations
     */
    public function __construct(string $file = 'db_conn.yaml')
    {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/../config/' . $file;
        //parse given config file
        $settings = Yaml::parse(file_get_contents($file));
        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];

        $username = $settings['database']['username'];
        $password = $settings['database']['password'];

        parent::__construct($dns, $username, $password);
    }

}