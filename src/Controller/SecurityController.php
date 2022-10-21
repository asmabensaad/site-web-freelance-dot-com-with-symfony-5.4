<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class SecurityController extends AbstractController
{
    #[Route('/security', name: 'app_security')]
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    
     #[Route('/register', name: 'user_registration')]
     
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user


            return $this->render('security/showUser.html.twig',[
               'user'=>$user,
            ]);
          // return $this->render('security/showUser.html.twig',['user'=>$user]);

          /*  return $this->redirectToRoute('show',['id'=>$user->getId(),
            ]);  */ 
}
return $this->render('security/form.html.twig',['user'=>$user,'form' => $form->createView(), ]);

           // array('form' => $form->createView())
       // );

}


#[Route('/show', name: 'show')]
public function show()
{     $user =$this->getUser();

    return $this->render('user/index.html.twig',[
        'user'=>$user,
    ]);
   /* return $this->render('security/showUser.html.twig',[
        'user'=>$user,
    ]);*/
}

#[Route(path: '/login', name: 'app_login')]
public function login(AuthenticationUtils $authenticationUtils): Response
{
    // if ($this->getUser()) {
    //     return $this->redirectToRoute('target_path');
    // }

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    $lastUsername = $authenticationUtils->getLastUsername();
    

   return $this->render('security/login2.html.twig', [
        'last_username' => $lastUsername,
         'error' => $error]);
   //return $this->redirectToRoute('admin');

 return $this->render('user/user.html.twig');
    

}


#[Route(path: '/logout', name: 'app_logout')]
public function logout(): void
{
    //throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    //return $this->render('security/logout.html.twig');
       
        
}





}
