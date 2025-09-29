<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sujet', TextType::class, [
                "label" => "Entrez le sujet",
                "attr" => [
                    "class" => "enrouge"
                ]
            ])
            ->add('email', TextType::class, [
                "constraints" => [
                    new NotBlank([], "Vous devez remplir ce champ !!!"),
                    new Email([], "Vous devez saisir votre email")
                ]
            ])
            ->add('message', TextareaType::class)
            ->add("Envoyer", SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            "attr" => [
                "novalidate" => "novalidate"
            ]
        ]);
    }
}
