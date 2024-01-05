<?php

namespace App\Controller;

use App\Service\Unit\UnitService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/units', name: 'unit_')]
class UnitController extends AbstractController
{
    public function __construct(
        private readonly UnitService $unitService
    )
    {
    }

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('unit/form.html.twig');
    }

    #[Route('/store', name: 'store', methods: ['POST'])]
    public function store(Request $request)
    {
        $result = $this->unitService->createUnit($request->request->all());
        if ($result['status']) {
            $this->addFlash('FlsMsg', 'Data successfully stored.');
            return $this->redirectToRoute('unit_create');
        }
        $this->addFlash('FlsMsgErr', 'Data successfully stored.');
        return $this->redirectToRoute('unit_create');

    }
}
