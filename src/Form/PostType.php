<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'attr' => ['placeholder' => 'My Awesome Title!'],
            ])
            ->add('slug', null, [
                'disabled' => true,
                'help' => '(help text)'
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Technical' => 1,
                    'Miscellaneous' => 2,
                ],
//                'expanded' => true
            ])
            ->add('tags', ChoiceType::class, [
                'choices' => [
                    'php' => 'php',
                    'symfony' => 'symfony',
                    'tutorial' => 'tutorial',
                ],
                'multiple' => true,
                'expanded' => true
            ])
            ->add('date', null, [
                'widget' => 'single_text'
            ])
            ->add('body')
            ->add('image', FileType::class, [
                'mapped' => false,
            ])
            ->add('published')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
