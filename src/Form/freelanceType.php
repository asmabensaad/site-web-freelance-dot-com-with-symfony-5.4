<?php

namespace App\Form;

use App\Entity\Freelancer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class freelanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('nom',TextType::class,[
                "attr"=> ['placeholder'=>"votre nom",'class' =>"form-control"]])
            //->add('roles')
            ->add('prenom' ,TextType::class,["attr"=> ['placeholder'=>"votre prenom","class" =>"form-control"]])
            ->add('telephone' ,TextType::class,["attr"=> ['placeholder'=>"votre telephone","class" =>"form-control"]])
            ->add('pays' ,TextType::class,["attr"=> ['placeholder'=>"pays de residence","class" =>"form-control"]])
            ->add('date_naissance' ,DateType::class,["attr"=> ["class" =>"form-control"]])
            ->add('image' ,TextType::class,["attr"=> ['placeholder'=>"votre photo","class" =>"form-control"]])
            ->add('envoyer',SubmitType::class,[
                "attr" =>['label'=>'confirmer','class'=>"btn btn-success"]])
                ->add('annuler',ResetType::class,[
                    "attr" =>['class'=>"btn btn-success"]])
           
        ;
    }
    
  
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Freelancer::class,
        ]);
    }
}
