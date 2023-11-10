<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    #[Route('/', name: 'app_main_page')]
    public function index(): Response
    {
        return $this->render('main_page/index.html.twig');
    }
    #[Route('/dog', name: 'app_images')]
    public function getImage(): Response
    {
        return $this->render('main_page/image.html.twig');
    }
}
