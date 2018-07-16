<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 17.07.2018
 * Time: 00:48
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AnnounceController extends Controller
{
    public function indexAction(): Response
    {
        return $this->render('announce/index.html.twig', []);
    }
}