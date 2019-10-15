<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use GF_Field;
use Itineris\GFLoqateBankVerification\API\Result;

class SortCodeValidator extends AbstractValidator
{
    use ValidationMessageConstructTrait;

    protected function shouldIntercept(Result $result): bool
    {
        return $result->isUnknownSortCode();
    }

    protected function markSortCodeFieldAsFailed(GF_Field $field): void
    {
        $field->failed_validation = true;
        $field->validation_message = $this->validationMessage;
    }

    protected function markAccountNumberFieldAsFailed(GF_Field $field): void
    {
        // Do nothing.
    }
}
