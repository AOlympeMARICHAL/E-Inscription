<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Individu;
use App\Form\AContacterType;
use App\Form\AntecedentType;
use App\Form\EleveType;
use App\Form\FinancierType;
use App\Form\IndividuType;
use App\Form\ResponsableType;
use App\Form\UrgenceType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class FormController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('inscription/un.html.twig');
    }

    #[Route("/inscription/getPage1", name: "app_inscription_getPage1")]
    public function page1(Request $request, EntityManagerInterface $em)
    {
        $individu = new Individu;
        $individuForm = $this->createForm(IndividuType::class, $individu);
        $eleve = new Eleve;
        $eleveForm = $this->createForm(EleveType::class, $eleve);
    
        return $this->render('inscription/deux.html.twig', array(
            'individuForm' => $individuForm,
            'eleveForm' => $eleveForm
        ));
    }
}