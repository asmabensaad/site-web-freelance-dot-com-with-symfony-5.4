<?php

namespace App\Controller\Admin;
use App\Entity\Projet;
use App\Entity\User;
use App\Entity\Entreprise;
use App\Entity\Contact;
use App\Entity\CategorieProjet;
use App\Entity\Freelancer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
       // return parent::index();
        // $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        // $url = $routeBuilder->setController(ProjetCrudController::class)->generateUrl();

           //return $this->redirect($url);
           return $this->render('admin/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('FreelanceDotCom');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
         yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
         yield MenuItem::linkToCrud('liste projet', 'fas fa-projet', Projet::class);
         yield MenuItem::linkToCrud('liste utilisateur', 'fas fa-user', User::class);
         yield MenuItem::linkToCrud('liste des entreprises', 'fas fa-entreprise', Entreprise::class);
         yield MenuItem::linkToCrud('liste des emails recué', 'fas fa-contact', Contact::class);
         yield MenuItem::linkToCrud('categorie projet', 'fas fa-categorie', CategorieProjet::class);
         yield MenuItem::linkToCrud('liste Freelancer', 'fas fa-freelancer', Freelancer::class);

    }
}
