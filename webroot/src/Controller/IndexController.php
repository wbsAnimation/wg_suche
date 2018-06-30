<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 30.06.2018
 * Time: 17:13
 */

namespace App\Controller;


use App\Helper\AbstractUserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{

    public function indexAction(): Response
    {

        return $this->render('base.html.twig', array());
    }
}