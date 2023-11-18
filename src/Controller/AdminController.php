<?php

namespace App\Controller;

use App\Form\CommentType;
use App\Service\CommentService;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(UserService $userService): Response
    {
        $users = $userService->getAllUsers();
        return $this->render('admin/index.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/admin/delete', name: 'app_admin_deleteUser', methods: 'POST')]
    public function deleteUser(UserService $userService, Request $request): Response
    {
        $id = $request->request->get('id');
        $userService->deleteUser($id);
        return $this->redirectToRoute('app_admin');
    }

    #[Route('/admin/addComment/{id}', name: 'app_admin_addComment')]
    public function addComment($id, Request $request, CommentService $commentService): Response
    {
        $form = $this->createForm(CommentType::class, ['id' => $id]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $commentService->addComment($data['comment'], (int)$data['id']);
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/addCommentForm.html.twig', [
            'id' => $id,
            'form' => $form->createView()
        ]);
    }
}


