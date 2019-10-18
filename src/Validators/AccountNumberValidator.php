<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use Itineris\GFLoqateBankVerification\API\Result;

class AccountNumberValidator extends AbstractValidator
{
    use SetAccountNumberFieldValidationMessageTrait;
    use NullSortCodeFieldValidationMessageTrait;
    use ValidationMessageTrait;

    protected function shouldIntercept(Result $result): bool
    {
        return $result->isInvalidAccountNumber();
    }
}
