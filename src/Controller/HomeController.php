<?php

namespace App\Controller;
use App\Form\contactType;
use App\Entity\Entreprise;
use App\Entity\Contact;
use App\Entity\Projet;
use App\Entity\Freelancer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {  
       
     
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    


    #[Route('/showentreprise', name: 'showentreprise')]
    public function show(): Response
    {  
    $em=$this->getDoctrine()->getManager();
    $repo=$em->getRepository(Entreprise ::class);
    $lesentreprises =$repo->findAll();
    return $this->render('home/listentreprises.html.twig',
    ['lesentreprises' =>$lesentreprises]);
    }


    #[Route('/showproject', name: 'showprojetct')]
    public function showProject(): Response
    {  
    $em=$this->getDoctrine()->getManager();
    $repo=$em->getRepository(Projet ::class);
    $listProjets =$repo->findAll();
    return $this->render('home/listprojet.html.twig',
    ['listProjets' =>$listProjets]);
    }


    #[Route('/showproject2', name: 'showprojetct2')]
    public function showProject2(): Response
    {  
    $em=$this->getDoctrine()->getManager();
    $repo=$em->getRepository(Projet ::class);
    $listProjets =$repo->findAll();
    return $this->render('home/listprojet2.html.twig',
    ['listProjets' =>$listProjets]);
    }









    #[Route('/showcandidat', name: 'showcandidat')]
    public function showcandidat(): Response
    {  
    $em=$this->getDoctrine()->getManager();
    $repo=$em->getRepository(Freelancer ::class);
    $lescandidats =$repo->findAll();
    return $this->render('home/listcandidats.html.twig',
    ['lescandidats' =>$lescandidats]);
    }


    #[Route('/envoyecontact', name: 'contactadmin')]
    public function contacter(Request $request): Response
    {
    
        $contact=new Contact();
        $form = $this->createForm(contactType::class, $contact);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->render('contact/EnvoyeCt.html.twig',['id' =>$contact->getId()]);

        }
        


    return $this->render('contact/contact.html.twig',['f' => $form->createView() ]);

    }


}
