<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use Itineris\GFLoqateBankVerification\API\Result;

class SortCodeValidator extends AbstractValidator
{
    use NullAccountNumberFieldValidationMessageTrait;
    use SetSortCodeFieldValidationMessageTrait;
    use ValidationMessageTrait;

    protected function shouldIntercept(Result $result): bool
    {
        return $result->isUnknownSortCode();
    }
}
