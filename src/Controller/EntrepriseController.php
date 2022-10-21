<?php

namespace App\Controller;
use App\Form\ProjetType;
use App\Entity\Projet;
use App\Entity\Entreprise;
use App\Entity\CategorieProjet;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    public function index(): Response
    {
        return $this->render('entreprise/index.html.twig', [
            'controller_name' => 'EntrepriseController',
        ]);
    }

    #[Route('/addproject', name: 'addprj')]
    public function addproject(Request $request)
    {
        //$categorieProjet=new CategorieProjet();
        $projet=new Projet();
        $form=$this->createForm("App\Form\ProjetType",$projet);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush();
            return $this->render('entreprise/ajoutprojetsucces.html.twig', [
                'id' => $projet->getId()]);
          
        }
            return $this->render('entreprise/ajouterprojet.html.twig', ['f' => $form->createView() ]);

       

       
    }
   
    



}

