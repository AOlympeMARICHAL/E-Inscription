<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormTroisController extends AbstractController
{
    #[Route('/form/3', name: 'app_form_trois')]
    public function index(): Response
    {
        return $this->render('form_trois/index.html.twig', [
            'controller_name' => 'FormTroisController',
        ]);
    }
}
