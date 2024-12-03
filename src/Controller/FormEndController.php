<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormEndController extends AbstractController
{
    #[Route('/form/end', name: 'app_form_end')]
    public function index(): Response
    {
        return $this->render('form_end/index.html.twig', [
            'controller_name' => 'FormEndController',
        ]);
    }
}
