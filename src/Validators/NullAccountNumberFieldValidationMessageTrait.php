<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use GF_Field;
use Itineris\GFLoqateBankVerification\API\Result;

trait NullAccountNumberFieldValidationMessageTrait
{
    protected function markAccountNumberFieldAsFailed(GF_Field $field, Result $result): void
    {
        // Do nothing.
    }
}
