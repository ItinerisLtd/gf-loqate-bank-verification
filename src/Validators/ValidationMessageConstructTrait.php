<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use Itineris\GFLoqateBankVerification\API\BankAccountValidator;

trait ValidationMessageConstructTrait
{
    /** @var string */
    protected $validationMessage;

    public function __construct(
        string $sortCodeCssClass,
        string $accountNumberCssClass,
        BankAccountValidator $bankAccountValidator,
        string $validationMessage
    ) {
        parent::__construct($sortCodeCssClass, $accountNumberCssClass, $bankAccountValidator);
        $this->validationMessage = $validationMessage;
    }
}
