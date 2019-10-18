<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use Itineris\GFLoqateBankVerification\API\Result;

class DirectDebitCapableValidator extends AbstractValidator
{
    use SetAccountNumberFieldValidationMessageTrait;
    use SetSortCodeFieldValidationMessageTrait;
    use ValidationMessageTrait;

    protected function shouldIntercept(Result $result): bool
    {
        return $result->isCorrect() && ! $result->isDirectDebitCapable();
    }
}
