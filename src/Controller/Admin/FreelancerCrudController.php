<?php

namespace App\Controller\Admin;

use App\Entity\Freelancer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FreelancerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Freelancer::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
