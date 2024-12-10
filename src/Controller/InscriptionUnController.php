<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InscriptionUnController extends AbstractController
{
    #[Route('/inscription/un', name: 'app_inscription_un')]
    public function index(): Response
    {
        return $this->render('inscription_un/index.html.twig', [
            'controller_name' => 'InscriptionUnController',
        ]);
    }
}
