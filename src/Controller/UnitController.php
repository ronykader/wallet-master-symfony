<?php

namespace App\Controller;

use App\Entity\Unit;
use App\Repository\UnitRepository;
use App\Service\Unit\UnitService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/units', name: 'unit_')]
class UnitController extends AbstractController
{
    public function __construct(
        private readonly UnitService $unitService,
        private readonly UnitRepository $unitRepository
    )
    {
    }

    #[Route('/all', name: 'list')]
    public function index(): RedirectResponse|Response
    {
        $units = $this->unitRepository->getUnitData();
        return $this->render('unit/index.html.twig', [
               'units' => $units
            ]);
    }

    /**
     * @return Response
     */
    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('unit/form.html.twig');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    #[Route('/store', name: 'store', methods: ['POST'])]
    public function store(Request $request): RedirectResponse
    {
        $result = $this->unitService->createUnit($request->request->all());
        if ($result['status']) {
            $this->addFlash('FlsMsg', 'Data successfully stored.');
            return $this->redirectToRoute('unit_list');
        }
        $this->addFlash('FlsError', $result['message']);
        return $this->redirectToRoute('unit_create');
    }

    /**
     * @param Unit $unit
     * @return Response
     */
    #[Route('/{unit}/edit', name: 'edit', methods: ['GET'])]
    public function edit(Unit $unit): Response
    {
        return $this->render('unit/edit.html.twig', [
            'unit' => $unit
        ]);
    }


    /**
     * @param Request $request
     * @param Unit $unit
     * @return RedirectResponse
     * @throws Exception
     */
    #[Route('/{unit}/update', name: 'update')]
    public function update(Request $request, Unit $unit): RedirectResponse
    {
        $result = $this->unitService->update($request->request->all(), $unit);
        if ($result['status']) {
            $this->addFlash('FlsMsg', 'Data successfully Updated.');
            return $this->redirectToRoute('unit_list');
        }
        $this->addFlash('FlsError', $result['message']);
        return $this->redirectToRoute('unit_list');

    }

    #[Route('/{unit}/delete', name: 'destroy')]
    public function destroy(Unit $unit): RedirectResponse
    {
        $result = $this->unitService->destroy($unit);
        if ($result['status']) {
            $this->addFlash('FlsMsg', 'Data successfully Deleted.');
            return $this->redirectToRoute('unit_list');
        }
        $this->addFlash('FlsError', $result['message']);
        return $this->redirectToRoute('unit_list');
    }
}
