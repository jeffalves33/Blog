<?php

namespace App\Controller;

use App\Repository\PostagemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController{
    /**
     * @Route("/blog", name="blog")
     */
    public function indexAction(PostagemRepository $postagemRepository)
    {

        $data['postagens'] = $postagemRepository->findAll();

        return $this->render('main/main.html.twig', $data);
    }

    /**
     * @Route("/blog/{id}", name="blogPostagem")
     */
    public function postagem(
        $id,
        PostagemRepository $postagemRepository
    )
    {
        $postagem = $postagemRepository->find($id);
        return $this->renderView($postagem->getConteudo());
    }
}