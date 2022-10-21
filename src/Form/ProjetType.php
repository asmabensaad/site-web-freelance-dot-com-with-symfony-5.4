<?php

namespace App\Form;
use App\Entity\Projet ;

use App\Entity\CategorieProjet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('field_name')
            ->add('Titre',TextType::class, [
                "attr"=> ['placeholder'=>'titre']
            ])
            ->add('description',TextareaType::class,[
                "attr"=> ['placeholder'=>'description']])
            ->add('budget' ,IntegerType::class,[
                "attr"=> ['placeholder'=>'budget',"class" =>"form-control"]])
                
            ->add('date_depot')
            ->add('duree',NumberType::class,[
                "attr"=> ['placeholder'=>'dureé de projet',"class" =>"form-control"]])

                ->add('disponible',CheckboxType::class, [
                    "attr"=> ["class" =>"form-control"]
                ])
            
            ->add('categorieProjet',EntityType::class,[
                'class'=> CategorieProjet::class,
                'choice_label' =>'nom'
            ])
            
           
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
