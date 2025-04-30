<?php

namespace App\Controller;

use App\Entity\Antecedent;
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
        // Création des entités
        $individu = new Individu();
        $eleve = new Eleve();


        // Création d'un formulaire composite avec les entités Individu et Eleve
        $form = $this->createFormBuilder()
            ->add('individu', IndividuType::class)
            ->add('eleve', EleveType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Persistance des données dans la base
            $em->persist($data['individu']);
            $data['eleve']->setIndividu($data['individu']);
            $em->persist($data['eleve']);
            $em->flush();

            $request->getSession()->set('eleve_id', $data['eleve']->getId());


            // Redirection vers la route de la page suivante
            return $this->redirectToRoute('app_inscription_antecedent');
        }

        // Rendu du formulaire pour la première page
        return $this->render('inscription/un.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/inscription/antecedent', name: 'app_inscription_antecedent')]
    public function page2(Request $request, EntityManagerInterface $em): Response
    {
        // Récupération de l'ID de l'élève depuis la session
        $eleveId = $request->getSession()->get('eleve_id');
        $eleve = $em->getRepository(Eleve::class)->find($eleveId);

        $antecedent1 = new Antecedent();
        $antecedent2 = new Antecedent();

        // On crée un formulaire composite avec les deux entités
        $form = $this->createFormBuilder()
            ->add('antecedent1', AntecedentType::class)
            ->add('antecedent2', AntecedentType::class)
            ->add('eleve', EleveType::class)
            ->getForm();
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $data['antecedent1']->setEleve($eleve);
            $data['antecedent2']->setEleve($eleve);
            
            $em->persist($data['antecedent1']); 
            $em->persist($data['antecedent2']);    
            $em->flush();
    
            
            return $this->render('inscription/trois.html.twig');
        }
    
        return $this->render('inscription/deux.html.twig', [
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