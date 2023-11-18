<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [new NotBlank(),
                    new Regex('[a-zA-Z]', message: 'В имени не должно быть цифр!')]
            ])
            ->add('secondName', TextType::class, [
                'constraints' => [new NotBlank(),
                    new Regex('[a-zA-Z]', message: 'В фамилии не должно быть цифр!')]
            ])
            ->add('thirdName', TextType::class, [
                'constraints' => [new NotBlank(),
                    new Regex('[a-zA-Z]', message: 'В отчестве не должно быть цифр!')]
            ])
            ->add('age', IntegerType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('repeatPassword', PasswordType::class)
            ->add('submit', SubmitType::class, ['label' => 'Зарегистрироваться']);
    }
}