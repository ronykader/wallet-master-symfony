<?php

namespace App\Service;

class ValidationMessage
{
    public function messages($errors): array
    {
        $errorMessages = [];
        foreach ($errors as $error) {
            $errorMessages[] = $error->getMessage();
        }

        return [
            'status' => false,
            'message' => $errorMessages,
        ];
    }
}
