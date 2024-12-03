<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormSixController extends AbstractController
{
    #[Route('/form/six', name: 'app_form_six')]
    public function index(): Response
    {
        return $this->render('form_six/index.html.twig', [
            'controller_name' => 'FormSixController',
        ]);
    }
}
