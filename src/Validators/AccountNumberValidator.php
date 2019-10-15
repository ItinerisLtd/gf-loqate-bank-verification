<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use GF_Field;
use Itineris\GFLoqateBankVerification\API\Result;

class AccountNumberValidator extends AbstractValidator
{
    use ValidationMessageConstructTrait;

    protected function shouldIntercept(Result $result): bool
    {
        return $result->isInvalidAccountNumber();
    }

    protected function markSortCodeFieldAsFailed(GF_Field $field): void
    {
        // Do nothing.
    }

    protected function markAccountNumberFieldAsFailed(GF_Field $field): void
    {
        $field->failed_validation = true;
        $field->validation_message = $this->validationMessage;
    }
}
