<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('slug', null, [
                'disabled' => true,
                'help' => 'Automatically set...'
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Technical' => 1,
                    'Miscellaneous' => 2,
                ],
                //'expanded' => true
            ])
            ->add('tags', ChoiceType::class, [
                'choices' => [
                    'php' => 'php',
                    'symfony' => 'symfony',
                    'tutorial' => 'tutorial',
                ],
                'multiple' => true,
                //'expanded' => true
            ])
            ->add('date')
            ->add('published')
            ->add('body')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
