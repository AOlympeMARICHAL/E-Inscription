<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormCinqController extends AbstractController
{
    #[Route('/form/cinq', name: 'app_form_cinq')]
    public function index(): Response
    {
        return $this->render('form_cinq/index.html.twig', [
            'controller_name' => 'FormCinqController',
        ]);
    }
}
