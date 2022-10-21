<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EeasCorp\Bundle\easyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }
 /*   public function configureActions (Actions $action): Actions
{
    return $action
    ->add(Crud::PAGE_INDEX, Action::Detail);

    
}
    
  
    public function configureFields(string $pageName): iterable
    {
        return [
         //  IdField::new('id')->hideOnForm(),
          //  TextField::new('Description'),
          //  TextField::new('budget'),
          //  TextField::new('dureé'),
            DateTimeField::new('date_depo'),
        ];


           // yield AssociationField::new('Projet');
            //   yield TextField::new('description');
             //  yield TextField::new('budget');
             //  yield TextareaField::new('text')
             //    ->hideOnIndex();
              //  yield TextField::new('photoFilename')
              // ->onlyOnIndex();
              
              $date_depo = DateTimeField::new('date_depo')->setFormTypeOptions([
                          'html5' => true,
                          'years' => range(date('Y'), date('Y') + 5),
                          'widget' => 'single_text',

                        ]);


    }
 /*   public function configureCrud(Crud $crud): Crud
  {

    /*return [
        IdField :: new ('id'),
        TextField :: new ('Description'),
        TextField :: new ('budget'),
        TextField :: new ('durée'),
        TextField :: new ('Ddate depot'),
    ];

      return $crud
           ->setEntityLabelInSingular('Description ')
           ->setEntityLabelInSingular(' budget')
           ->setEntityLabelInSingular(' duree')
          ->setSearchFields(['budget', '', ''])
          ->setDefaultSort(['date_depot' => 'DESC'])
      ;
  }

  public function configureFilters(Filters $filters): Filters
     {
         return $filters
            ->add(EntityFilter::new('Projet'))
         ;
     }*/
    
}
