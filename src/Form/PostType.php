<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

class PostType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', TextType::class, ['label' => 'titulo: '])
            ->add('descricao', TextType::class, ['label' => 'descrição: '])
            ->add('conteudo', TextareaType::class, ['label' => 'conteudo: '])
            ->add('data_publicacao', DateType::class, ['label' => 'data de publicacao: '])
            ->add('icon', UrlType::class, ['label' => 'url do icone: '])
            ->add('url', TextType::class, ['label' => 'url da página: '] )
            ->add('Salvar', SubmitType::class)
        ;
    }
}