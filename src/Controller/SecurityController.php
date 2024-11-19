<?php

namespace App\Controller;
//namespace App\Controller\SecurityController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\SecurityBundle\Security;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(/*Security $security*/): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    public function someAction(Security $security): Response
    {
        // Logout the user in on the current firewall
        $response = $security->logout();

        // You can also disable the csrf logout
        $response = $security->logout(false);

        // ... return $response (if set) or e.g. redirect to the homepage
    }
}/*
class SecurityController
{
    public function someAction(Security $security): Response
    {
        // logout the user in on the current firewall
        $response = $security->logout();

        // you can also disable the csrf logout
        $response = $security->logout(false);

        // ... return $response (if set) or e.g. redirect to the homepage
    }
}*/