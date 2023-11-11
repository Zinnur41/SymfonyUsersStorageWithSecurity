<?php

namespace App\Service;

use App\Entity\Comment;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class CommentService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addComment(string $content, int $userId)
    {
        $user = $this->entityManager->getRepository(User::class)->find($userId);
        $comment = new Comment();
        $comment->setComment($content);
        $comment->setUsers($user);
        $this->entityManager->persist($comment);
        $this->entityManager->flush();
    }
}