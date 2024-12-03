<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormDeuxController extends AbstractController
{
    #[Route('/form/deux', name: 'app_form_deux')]
    public function index(): Response
    {
        return $this->render('form_deux/index.html.twig', [
            'controller_name' => 'FormDeuxController',
        ]);
    }
}
