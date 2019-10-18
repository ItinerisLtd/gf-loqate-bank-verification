<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use GF_Field;
use Itineris\GFLoqateBankVerification\API\Result;

trait NullSortCodeFieldValidationMessageTrait
{
    protected function markSortCodeFieldAsFailed(GF_Field $field, Result $result): void
    {
        // Do nothing.
    }
}
