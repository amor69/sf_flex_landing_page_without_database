<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 25/09/17
 * Time: 09:40
 */

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Prénom'],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Nom'],
            ])
            ->add('society', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Société'],
            ])
            ->add('function', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Fonction'],
            ])
            ->add('phone', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Numéro de téléphone'],
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre E-mail'],
            ])
            ->add('address', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Adresse'],
            ])
            ->add('postalCode', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'CP'],
            ])
            ->add('city', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Ville'],
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Laissez votre message'],
            ])
            ->add('submit', SubmitType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Enregistrer']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contact::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'Contact';
    }
}
