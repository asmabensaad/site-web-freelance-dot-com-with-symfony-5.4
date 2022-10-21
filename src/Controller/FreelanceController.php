<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Entity\Freelancer;
use App\Form\freelanceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class FreelanceController extends AbstractController
{
    #[Route('/freelance', name: 'app_freelance')]
    public function index(): Response
    {


        return $this->render('freelance/index.html.twig', [
            'controller_name' => 'FreelanceController',
        ]);
    }




    #[Route('/modifierinfo', name: 'freelncerInfo')]
    public function info(Request $request): Response
    {
    
        $freelancer=new Freelancer();
        $form = $this->createForm(freelanceType::class, $freelancer);
        $form->handleRequest($request);
        if($form->isSubmitted()   && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($freelancer);
            $em->flush();
            return $this->render('freelance/info.html.twig',[ 'freelancer'=>$freelancer,]
           );

        }
        return $this->render('freelance/formfreelancer.html.twig',['freelancer'=>$freelancer,'form' => $form->createView(), ]);
    }
}
   

        




    

