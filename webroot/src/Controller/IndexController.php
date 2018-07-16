<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 30.06.2018
 * Time: 17:13
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{

    public function indexAction(): Response
    {
        $loggedIn = 'false';
        if (!empty($_GET)) {
            $loggedIn = $_GET['loggedIn'];
        }
        return $this->render('base.html.twig', array("loggedIn" => $loggedIn));
    }
}