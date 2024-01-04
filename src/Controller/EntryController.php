<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntryController extends AbstractController
{
    #[Route('/entry', name: 'app_entry')]
    public function index(): Response
    {
        return $this->render('entry/index.html.twig', [
            'controller_name' => 'EntryController',
        ]);
    }
}
