<?php

namespace App\Controller\Admin;

use App\Entity\CategorieProjet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategorieProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieProjet::class;
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
