<?php

namespace App\Controller;

use App\Repository\PostagemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController{
    /**
     * @Route("/blog", name="blog")
     */
    public function indexAction(PostagemRepository $postagemRepository)
    {

        //dd($_SERVER["REQUEST_URI"]);
        $data['postagens'] = $postagemRepository->findAll();

        return $this->render('main/main.html.twig', $data);
    }

    /**
     * @Route("/blog/{id}", name="blogPostagem")
     */
    public function postagem(
        $id,
        PostagemRepository $postagemRepository
    ) : Response
    {
        $postagem = $postagemRepository->find($id);
        return new Response($postagem->getConteudo());
    }
}