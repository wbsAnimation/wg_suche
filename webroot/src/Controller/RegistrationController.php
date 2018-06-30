<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 30.06.2018
 * Time: 17:03
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    /**
     * Registrierungsformular
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('registration/registration.html.twig', array());
    }
}