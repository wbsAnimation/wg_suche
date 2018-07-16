<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 17.07.2018
 * Time: 00:42
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    public function indexAction(): Response
    {
        $this->render('base.html.twig');
        return $this->redirectToRoute("index", ['loggedIn' => 'false']);
    }
}