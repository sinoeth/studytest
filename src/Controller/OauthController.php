<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OauthController extends AbstractController
{
    /**
     * @Route("/oauth", name="oauth")
     */
    public function index()
    {
        return $this->render('oauth/index.html.twig', [
            'controller_name' => 'OauthController',
        ]);
    }

    /**
     * @Route("/oauth/auth", name="oauth_auth")
     */
    public function auth()
    {
        $redirectUri = $this->generateUrl('oauth_token');
        $url = 'http://coop.apps.symfonycasts.com/authorize?'.http_build_query([
                'client_id'=>'Next Coop',
                'response_type'=>'code',
                'redirect_uri'=>$redirectUri,
                'scope'=>'eggs-count profile'
            ]);
        return $this->redirect($url);
    }
    /**
     * @Route("/oauth/token", name="oauth_token")
     */
    public function token(Request $request)
    {
        $code = $request->get('code');
        var_dump($code); die;
    }
}
