<?php
/**
 * Created by PhpStorm.
 * User: candu
 * Date: 17.07.2018
 * Time: 00:48
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class AnnounceController extends Controller
{
    public function indexAction(): Response
    {
        return $this->render('announce/index.html.twig', []);
    }

    public function shareRoomAction(): Response
    {
        $request = Request::createFromGlobals();
        $postData = $this->getPostData($request);
        $user = $this->container->get('session');
        var_dump($user);
        exit;
        $this->render('base.html.twig');
        return $this->redirectToRoute("index", ['loggedIn' => 'true']);
    }

    /**
     * Gibt die Postdaten zurück.
     *
     * @param Request $request
     * @return array
     */
    protected function getPostData(Request $request): array
    {
        $data['announce'] = $request->get('announce');
        $data['address']['street'] = $request->get('address')['street'];
        $data['address']['number'] = $request->get('address')['number'];
        $data['address']['postCode'] = $request->get('address')['postCode'];
        $data['address']['city'] = $request->get('address')['city'];
        if (isset($request->get('address')['public'])) {
            $data['address']['public'] = $request->get('address')['public'];
        }
        $data['arrival'] = $request->get('arrival');
        $data['rentalCharges'] = $request->get('rentalCharges');
        $data['roomSize'] = $request->get('roomSize');
        return $data;
    }
}