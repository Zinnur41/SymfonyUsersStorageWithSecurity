<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('registration/index.html.twig');
    }

    #[Route('/registration', name: 'app_add_registration', methods: 'POST')]
    public function registration(UserService $userService, Request $request): Response {
        $fields = $request->request->all();
        $userService->addUser($fields);
        return $this->redirectToRoute('app_main_page');
    }
}
