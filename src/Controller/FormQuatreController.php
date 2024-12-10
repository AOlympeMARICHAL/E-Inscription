<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormQuatreController extends AbstractController
{
    #[Route('/form/4', name: 'app_form_quatre')]
    public function index(): Response
    {
        return $this->render('form_quatre/index.html.twig', [
            'controller_name' => 'FormQuatreController',
        ]);
    }
}
