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

class RegistrationController extends Controller
{
    /** @const PASSWORD_LENGTH - Länge des Passworts */
    const PASSWORD_LENGTH = 7;

    /**
     * Registrierungsformular
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('registration/registration.html.twig', []);
    }

    /**
     * Registrierungsformular
     *
     * @return Response
     */
    public function addUserAction(): Response
    {
        /** @var AbstractUserHelper $userHelper */
        $userHelper = $this->get('abstract_user_helper');
        $request = Request::createFromGlobals();

        if (strlen($request->get('password')) < static::PASSWORD_LENGTH) {
            return $this->render(
                'registration/registration.html.twig',
                ['error' => "Dein Passwort muss länger als 6 Zeichen sein!"]
            );
        }
        $postData = $this->getPostData($request);
        try {
            /** Email Überprüfung */
            if ($userHelper->isEmailAvailable($postData['email']) > 0) {
                return $this->render(
                    'registration/registration.html.twig',
                    ['error' => "Die Email Adresse wird schon benutzt!"]
                );
                /** Erfolgreich registriert */
            } else {
                $userHelper->insertUser($postData);
                return $this->render('base.html.twig', ['loggedIn' => 'true']);
            }
        } catch (\PDOException $exception) {
            var_dump($exception);
            exit;
        }
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