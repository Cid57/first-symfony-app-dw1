<?php

namespace App\Form;

use App\Entity\Tag;
use App\DTO\SearchFormDataDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Votre recherche'
                ]
            ])
            ->add('tag', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'label',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchFormDataDTO::class,
        ]);
    }
}
