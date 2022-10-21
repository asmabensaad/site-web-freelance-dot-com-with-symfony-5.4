<?php

namespace App\Form;
use App\Entity\contact ;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;



class contactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('field_name')
            ->add('nom',TextType::class, [
                "attr"=> ['placeholder'=>"votre nom",'class'=>"form-control"]
            ])
           
            ->add('email' ,EmailType::class,[
                "attr"=> ['placeholder'=>"votre email","class" =>"form-control"]])
                ->add('objectif',TextType::class,[
                    "attr"=> ['placeholder'=>"objectif","class" =>"form-control"]])
                
                ->add('message',TextareaType::class,[
                    "attr"=> ['placeholder'=>"ecrivez votre message en clair","class" =>"form-control"]])

                    ->add('envoyer',SubmitType::class,[
                        "attr" =>['label'=>'Envoyer','class'=>"btn btn-success" ,"display: inline"]])
                        ->add('annuler',ResetType::class,[
                            "attr" =>['class'=>"btn btn-success","display: inline"]])
   
            
           
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'=>Contact::class
            // Configure your form options here
        ]);
    }
}
