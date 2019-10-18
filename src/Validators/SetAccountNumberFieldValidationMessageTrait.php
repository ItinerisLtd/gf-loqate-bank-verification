<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use GF_Field;
use Itineris\GFLoqateBankVerification\API\Result;

trait SetAccountNumberFieldValidationMessageTrait
{
    /** @var string */
    protected $validationMessage;

    protected function markAccountNumberFieldAsFailed(GF_Field $field, Result $result): void
    {
        $field->failed_validation = true;
        $field->validation_message = $this->getValidationMessage();
    }
}
