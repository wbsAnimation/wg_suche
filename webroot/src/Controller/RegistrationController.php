<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 30.06.2018
 * Time: 17:03
 */

namespace App\Controller;

use App\Helper\AbstractUserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

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

    /**
     * Registrierungsformular
     *
     * @return Response
     */
    public function addUserAction(): Response
    {
        /** @var AbstractUserHelper $userHelper*/
        $userHelper = $this->get('abstract_user_helper');
        $request = Request::createFromGlobals();
        $postData = $this->getPostData($request);

        // Setze Cookie um Anmeldung zu beweisen.
        $request->cookies->set('user_session', sha1(md5($postData['email'])));

        // TODO: Hier muss noch was getan werden
//        $request->cookies->get('user_session');
        $postData['session_id'] = '';

        try {
            $userHelper->insertUser($postData);
        } catch (\PDOException $exception) {
            var_dump($exception);
            exit;
        }

        return $this->render('base.html.twig', array());
    }

    /**
     * Gibt die Postdaten zurück.
     *
     * @param Request $request
     * @return array
     */
    protected function getPostData(Request $request): array
    {
        $data['firstname'] = $request->get('firstname');
        $data['lastname'] = $request->get('lastname');
        $data['email'] = $request->get('email');
        $data['password'] = hash('sha256', $request->get('password'));
        return $data;
    }
}