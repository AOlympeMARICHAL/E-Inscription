<?php

namespace App\Controller;

use App\Entity\Antecedent;
use App\Entity\Eleve;
use App\Entity\Individu;
use App\Entity\Responsable;
use App\Entity\Urgence;
use App\Entity\Financier;
use App\Form\AContacterType;
use App\Form\AntecedentType;
use App\Form\EleveType;
use App\Form\FinancierType;
use App\Form\IndividuType;
use App\Form\ResponsableType;
use App\Form\UrgenceType;
use App\Form\UserType;
use App\Repository\EleveRepository;
use App\Repository\IndividuRepository;
use App\Repository\ResponsableRepository;
use App\Repository\UserRepository;
use App\Repository\FinancierRepository;
use App\Repository\UrgenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
 
        $form = $this->createFormBuilder([
            'individu' => $individu,
            'eleve' => $eleve,
        ])
        ->add('individu', IndividuType::class)
        ->add('eleve', EleveType::class)
        ->getForm();
 
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
 
            $em->persist($data['individu']);
            $em->persist($data['eleve']);
            $data['eleve']->setIndividu($data['individu']);
            $em->persist($data['eleve']);
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

    #[Route('/inscription/antecedent', name: 'app_inscription_etape2')]
    public function page2(Request $request, EntityManagerInterface $em,EleveRepository $eleveRepository): Response
    {
        
        $antecedent1 = new Antecedent();
        $antecedent2 = new Antecedent();
        $eleve = $eleveRepository->findOneBy([], ['id' => 'DESC']);
 
         
        $form = $this->createFormBuilder([
            'antecedent1' => $antecedent1,
            'antecedent2' => $antecedent2,
           
        ])
        ->add('antecedent1', AntecedentType::class)
        ->add('antecedent2', AntecedentType::class)
        ->getForm();
 
 
 
         $form->handleRequest($request);
 
if ($form->isSubmitted() && $form->isValid()) {
    $data = $form->getData();
    $antecedent1 = $data['antecedent1'];
    $antecedent2 = $data['antecedent2'];

    $antecedent1->setIdEleve($eleve);
    $antecedent2->setIdEleve($eleve);
    
    // Create DateTime objects instead of using integers
    $year1 = (int)date('Y') - 2;
    $date1 = new \DateTime();
    $date1->setDate($year1, 9, 1); // January 1st of the year
    $antecedent1->setAnnee($date1);
    
    $year2 = (int)date('Y') - 1;
    $date2 = new \DateTime();
    $date2->setDate($year2, 8, 1); // January 1st of the year
    $antecedent2->setAnnee($date2);
    
    $em->persist($antecedent1);
    $em->persist($antecedent2);
    $em->flush();

    return $this->redirectToRoute('app_inscription_etape4');
}

        return $this->render('inscription/deux.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/inscription/responsableslegaux', name: 'app_inscription_etape3')]
public function page3(Request $request, SessionInterface $session): Response
{
    // Use Responsable objects instead of Individu
    $parent1 = new Responsable();
    $parent2 = new Responsable();

    $form = $this->createFormBuilder([
        'parent1' => $parent1,
        'parent2' => $parent2,
    ])
    ->add('parent1', ResponsableType::class)
    ->add('parent2', ResponsableType::class)
    ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $data = $form->getData();
        
        $session->set('parent1', $data['parent1']);
        $session->set('parent2', $data['parent2']);
        
        return new RedirectResponse($this->generateUrl('app_inscription_etape4'));
    }

    return $this->render('inscription/trois.html.twig', [
        'form' => $form->createView(),
    ]);
}


#[Route('/inscription/urgence', name: 'app_inscription_etape4')]
public function page4(Request $request, SessionInterface $session, EntityManagerInterface $entityManager): Response
{
    $urgence = new Urgence();

    $form = $this->createForm(UrgenceType::class, $urgence);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Données déjà mappées dans $urgence
        $entityManager->persist($urgence);
        $entityManager->flush();

        $session->set('urgence', $urgence->getId()); // Optionnel : stocker l'ID en session

        return new RedirectResponse($this->generateUrl('app_inscription_etape5'));
    }

    return $this->render('inscription/quatre.html.twig', [
        'form' => $form->createView(),
    ]);
}

#[Route('/inscription/financier', name: 'app_inscription_etape5')]
public function page5(Request $request, SessionInterface $session): Response
{
    $financier = new Financier();

    $form = $this->createForm(FinancierType::class, $financier);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $data = $form->getData();
        $session->set('financier', $data);
        
        return new RedirectResponse($this->generateUrl('app_inscription_etape6'));
    }

    return $this->render('inscription/cinq.html.twig', [
        'form' => $form->createView(),
    ]);
}
}