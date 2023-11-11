<?php

namespace App\Controller;

use App\Service\CommentService;
use App\Service\UserService;
use phpDocumentor\Reflection\Types\This;
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
    public function deleteUser(UserService $userService, Request $request):Response
    {
        $id = $request->request->get('id');
        $userService->deleteUser($id);
        return $this->redirectToRoute('app_admin');
    }

    #[Route('/admin/addComment/{id}', name: 'app_admin_show_addComment', methods: 'GET')]
    public function showAddCommentForm($id): Response
    {
        return $this->render('admin/addCommentForm.html.twig', [
            'id' => $id
        ]);
    }
    #[Route('/admin/addComment', name: 'app_admin_addComment', methods: 'POST')]
    public function addComment(CommentService $commentService, Request $request):Response
    {
        $comment = $request->request->get('comment');
        $userId = $request->request->get('id');
        $commentService->addComment($comment, $userId);
        return $this->redirectToRoute('app_admin');
    }
}
