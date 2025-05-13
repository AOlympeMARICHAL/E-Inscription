<?php

namespace App\Controller;

use App\Entity\AContacter;
use App\Entity\Antecedent;
use App\Entity\Eleve;
use App\Entity\Financier;
use App\Entity\Individu;
use App\Entity\Responsable;
use App\Entity\Urgence;
use App\Form\AContacterType;
use App\Form\AntecedentType;
use App\Form\EleveType;
use App\Form\FinancierType;
use App\Form\IndividuType;
use App\Form\ResponsableType;
use App\Form\UrgenceType;
use App\Form\UserType;
use App\Repository\EleveRepository;
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
        $antecedent1 = new Antecedent();
        $antecedent2 = new Antecedent();
        $parent1 = new Responsable();
        $parent2 = new Responsable();
        $urgence = new Urgence();
        $financier = new Financier();



        $form = $this->createFormBuilder([
            'individu' => $individu,
            'eleve' => $eleve,
            'antecedent1' => $antecedent1,
            'antecedent2' => $antecedent2,
            'parent1' => $parent1,
            'parent2' => $parent2,
            'urgence' => $urgence,
            'financier' => $financier,
            
        ])
        ->add('individu', IndividuType::class)
        ->add('eleve', EleveType::class)
        ->add('antecedent1', AntecedentType::class)
        ->add('antecedent2', AntecedentType::class)
        ->add('parent1', ResponsableType::class)
        ->add('parent2', ResponsableType::class)
        ->add('urgence', UrgenceType::class)
        ->add('financier', FinancierType::class)
        ->add('aContacter', AContacterType::class)
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $individu = $data['individu'];
            $financier = $data['financier'];
            $responsable1 = $data['parent1'];
            $responsable2 = $data['parent2'];
            $urgence = $data['urgence'];
            $aContacter = $data['aContacter'];
            $eleve = $data['eleve'];

            // Liens internes à Individu
            $individu->setFinancier($financier);
            $individu->setResponsable1($data['parent1']);
            $individu->setResponsable2($data['parent2']);
            $individu->setUrgence($urgence);

            $eleve->setIndividu($individu);
            $eleve->setFinancier($financier); // Relation bidirectionnelle
            $financier->addIdEleve($eleve);

             // Antécédents
            $antecedent1 = $data['antecedent1'];
            $antecedent1->setIdEleve($eleve);
            $antecedent1->setAnnee(date('Y') - 2);

            $antecedent2 = $data['antecedent2'];
            $antecedent2->setAnnee(date('Y') - 1);
            $antecedent2->setIdEleve($eleve);

            // Urgence et AContacter
            $aContacter->setIdUrgence($urgence);

            $em->persist($financier);
            $em->persist($responsable1);
            $em->persist($responsable2);
            $em->persist($urgence);
            $em->persist($aContacter);
            $em->persist($individu);
            $em->persist($eleve);
            $em->persist($antecedent1);
            $em->persist($antecedent2);

            $em->flush();

            $request->getSession()->set('eleve_id', $data['eleve']->getId());

            // Redirection vers la route de la page suivante
            return $this->redirectToRoute('app_inscription_etape2');
        }

        // Rendu du formulaire pour la première page
        return $this->render('inscription/un.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/inscription/end', name: 'app_inscription_end')]
    public function end(): Response
    {
        return $this->render('inscription/end.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }

}
    #------------------------------------------------------------------------------------

//     #[Route('/inscription/antecedent', name: 'app_inscription_etape2')]
//     public function page2(Request $request, EntityManagerInterface $em): Response
//     {
//         $antecedent1 = new Antecedent();
//         $antecedent2 = new Antecedent();

//         $form = $this->createFormBuilder([
//             'antecedent1' => $antecedent1,
//             'antecedent2' => $antecedent2,

//         ])
//         ->add('antecedent1', AntecedentType::class)
//         ->add('antecedent2', AntecedentType::class)
//         ->getForm();

//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             $data = $form->getData();

//             $em->persist($data['antecedent1']);
//             $em->persist($data['antecedent2']);

//             return $this->redirectToRoute('app_inscription_etape3');
//         }
    
//         return $this->render('inscription/deux.html.twig', [
//             'form' => $form->createView(),
//         ]);
//     }

//     #[Route('/inscription/ResponsablesLegaux', name: 'app_inscription_etape3')]
//     public function etape3(Request $request, EntityManagerInterface $em): Response
//     {
//         $parent1 = new Individu();
//         $parent2 = new Individu();


//         $form = $this->createFormBuilder([
//             'parent1' => $parent1,
//             'parent2' => $parent2,
//         ])
//         ->add('parent1', ResponsableType::class)
//         ->add('parent2', ResponsableType::class)
//         ->getForm();

//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             $data = $form->getData();

//             $em->persist($data['financier']);
//             $em->persist($data['aContacter']);

//             return $this->redirectToRoute('app_inscription_confirmation');
//         }

//         return $this->render('inscription/etape3.html.twig', [
//             'form' => $form->createView(),
//         ]);
//     }   


