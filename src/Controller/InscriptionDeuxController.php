<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InscriptionDeuxController extends AbstractController
{
    #[Route('/inscription/deux', name: 'app_inscription_deux')]
    public function index(): Response
    {
        return $this->render('inscription_deux/index.html.twig', [
            'controller_name' => 'InscriptionDeuxController',
        ]);
    }
}
