<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccueilInscriptionController extends AbstractController
{
    #[Route('/accueil/inscription', name: 'app_accueil_inscription')]
    public function index(): Response
    {
        return $this->render('accueil_inscription/index.html.twig', [
            'controller_name' => 'AccueilInscriptionController',
        ]);
    }
}
