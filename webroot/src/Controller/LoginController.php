<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 07.07.2018
 * Time: 17:34
 */

namespace App\Controller;


use App\Helper\AbstractUserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * Loginformular
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('login/login.html.twig', []);
    }

    public function loginAction(): Response
    {
        /** @var AbstractUserHelper $userHelper */
        $userHelper = $this->get('abstract_user_helper');
        $request = Request::createFromGlobals();
        $postData = $this->getPostData($request);
    }
}