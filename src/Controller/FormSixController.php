<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormSixController extends AbstractController
{
    #[Route('/form/6', name: 'app_form_six')]
    public function index(): Response
    {
        return $this->render('form/six.html.twig', [
            'controller_name' => 'FormSixController',
        ]);
    }
}
