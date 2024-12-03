<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormUnController extends AbstractController
{
    #[Route('/form_incription_un', name: 'app_form_un')]
    public function index(): Response
    {
        return $this->render('form_un/index.html.twig', [
            'controller_name' => 'FormUnController',
        ]);
    }
}
