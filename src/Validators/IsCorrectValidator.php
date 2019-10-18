<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use GF_Field;
use Itineris\GFLoqateBankVerification\API\Result;

class IsCorrectValidator extends AbstractValidator
{
    use ValidationMessageTrait;

    protected function shouldIntercept(Result $result): bool
    {
        return ! $result->isCorrect()
            && ! $result->isInvalidAccountNumber() // Because of `AccountNumberValidator`.
            && ! $result->isUnknownSortCode(); // Because of `SortCodeValidator`.
    }

    protected function markAccountNumberFieldAsFailed(GF_Field $field, Result $result): void
    {
        $field->failed_validation = true;
        $field->validation_message = $this->getCauseAndResolution($result) ?: $this->getValidationMessage();
    }

    protected function getCauseAndResolution(Result $result): string
    {
        $cause = $result->getCause() ?? '';
        $resolution = $result->getResolution() ?? '';

        $validationMessage = sprintf(
            '%1$s %2$s',
            sanitize_text_field($cause),
            sanitize_text_field($resolution)
        );

        return trim($validationMessage);
    }

    protected function markSortCodeFieldAsFailed(GF_Field $field, Result $result): void
    {
        $field->failed_validation = true;
        $field->validation_message = $this->getCauseAndResolution($result) ?: $this->getValidationMessage();
    }
}
