<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 07.07.2018
 * Time: 17:34
 */

namespace App\Controller;


use App\Helper\AbstractUserHelper;
use App\Helper\LoginHelper;
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

    /**
     * User wird eingeloggt, wenn er die richtige Email und das richtige Passwort eingibt.
     * Zusätzlich wird er weitergeleitet zur Startseite.
     *
     * @return Response
     */
    public function loginAction(): Response
    {
        /** @var LoginHelper $loginHelper */
        $loginHelper = $this->get('login_helper');
        $request = Request::createFromGlobals();
        $postData = $this->getPostData($request);

        if ($loginHelper->isUserAvailable($postData)) {
            var_dump("drin");
        }
        exit;
    }

    /**
     * Gibt die Postdaten zurück.
     *
     * @param Request $request
     * @return array
     */
    protected function getPostData(Request $request): array
    {
        $data['email'] = $request->get('email');
        $data['password'] = hash('sha256', $request->get('password'));
        return $data;
    }
}