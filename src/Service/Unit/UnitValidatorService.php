<?php

namespace App\Service\Unit;

use App\Service\ValidationMessage;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UnitValidatorService
{
    public function __construct(
        private readonly ValidatorInterface $validator,
        private readonly ValidationMessage $validationMessage,
    )
    {
    }

    public function validatorsUnitData($data): array
    {
        $errors = $this->validator->validate($data);
        if (count($errors)) {
            return $this->validationMessage->messages($errors);
        }
        return [
            'status' => true,
        ];
    }
}
