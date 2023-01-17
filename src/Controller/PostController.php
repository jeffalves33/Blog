<?php

namespace App\Controller;

use App\Entity\Postagem;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController{
    /**
     * @Route("/new", name="new")
     */
    public function adicionar(Request $request, EntityManagerInterface $entityManager)
    {
        $mensagem = '';
        $postagem = new Postagem();

        $form = $this->createForm(PostType::class, $postagem);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $entityManager->persist($postagem);
            $entityManager->flush();
            $mensagem = 'Postagem adicionada!';
        }

        return $this->render('postagem/new.html.twig', [
            'form'     => $form,
            'mensagem' => $mensagem]);
    }
}