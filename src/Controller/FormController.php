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
    public function page1(Request $request, EntityManagerInterface $em): Response
    {
    
        // On crée un formulaire composite avec les deux entités
        $form = $this->createFormBuilder()
            ->add('individu', IndividuType::class)
            ->add('eleve', EleveType::class)
            ->getForm();
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            $em->persist($data['individu']); // On persiste l'individu
            $em->persist($data['eleve']);    // On persiste l'élève
            $em->flush();
    
            // Redirection vers la page deux.html.twig si succès
            return $this->render('inscription/deux.html.twig');
        }
    
        return $this->render('inscription/un.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}

//     #[Route("/inscription/getPage1", name: "app_inscription_getPage1")]
//     public function page1()
//     {
//         $individu = new Individu;
//         $individuForm = $this->createForm(IndividuType::class, $individu);

        
//             $data = $individuForm->getData();
//             $em->persist($data);
//             $em->flush();
//         }

//         $eleve = new Eleve;
//         $eleveForm = $this->createForm(EleveType::class, $eleve);

//         if () {
            
//         }
    
//         return $this->

//     }
// }