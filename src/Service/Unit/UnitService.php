<?php

namespace App\Service\Unit;

use App\Entity\Unit;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class UnitService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UnitValidatorService $unitValidatorService
    )
    {
    }

    public function createUnit(array $data): array
    {
        try {
            $date = new DateTime('now', new \DateTimeZone('Asia/Dhaka'));
            $unit = new Unit();
            $unit->setName($data['unit_name']);
            $unit->setSlug(strtolower($data['unit_name']));
            $unit->setStatus($data['unit_status']);
            $unit->setCreatedBy(1);
            $unit->setCreatedAt($date);
            $validationResult = $this->unitValidatorService->validatorsUnitData($unit);
            if (!$validationResult['status']) {
                return $validationResult;
            }
            $this->entityManager->persist($unit);
            $this->entityManager->flush();
            return [
                'status' => true,
                'message' => 'Success! The data has been added',
            ];
        } catch (\Exception $exception) {
            return [
                'status' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

}
