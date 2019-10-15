<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\Validators;

use GF_Field;
use Itineris\GFLoqateBankVerification\API\BankAccountValidator;
use Itineris\GFLoqateBankVerification\API\Result;
use RGFormsModel;

abstract class AbstractValidator
{
    /** @var string */
    protected $sortCodeCssClass;
    /** @var string */
    protected $accountNumberCssClass;
    /** @var BankAccountValidator */
    protected $bankAccountValidator;

    public function __construct(
        string $sortCodeCssClass,
        string $accountNumberCssClass,
        BankAccountValidator $bankAccountValidator
    ) {
        $this->sortCodeCssClass = $sortCodeCssClass;
        $this->accountNumberCssClass = $accountNumberCssClass;
        $this->bankAccountValidator = $bankAccountValidator;
    }

    public function validate(array $validationResult): array
    {
        $form = $validationResult['form'];

        $sortCodeFields = $this->getVisibleFields($this->sortCodeCssClass, $form);
        $accountNumberFields = $this->getVisibleFields($this->accountNumberCssClass, $form);

        // Early quit if no visible fields found.
        if ([] === $sortCodeFields || [] === $accountNumberFields) {
            return $validationResult;
        }

        $sortCodeField = $sortCodeFields[$this->arrayKeyFirst($sortCodeFields)];
        $accountNumberField = $accountNumberFields[$this->arrayKeyFirst($accountNumberFields)];

        $result = $this->check($sortCodeField, $accountNumberField);

        if (! $this->shouldIntercept($result)) {
            return $validationResult;
        }

        // Fail the validation for the entire form.
        $validationResult['is_valid'] = false;

        // Mark the specific fields that failed and add a custom validation message.
        $this->markSortCodeFieldAsFailed($sortCodeField);
        $this->markAccountNumberFieldAsFailed($accountNumberField);

        // Assign our modified $form object back to the validation result.
        $validationResult['form'] = $form;

        // Return the validation result.
        return $validationResult;
    }

    protected function isVisible(GF_Field $field, array $form, int $currentPage): bool
    {
        // On the current page AND the field is not hidden by GF conditional logic.
        return $currentPage === (int) $field->pageNumber
            && ! RGFormsModel::is_field_hidden($form, $field, []);
    }

    protected function getFields(string $cssClass, GF_Field ...$fields): array
    {
        return array_filter($fields, function (GF_Field $field) use ($cssClass): bool {
            return strpos($field->cssClass, $cssClass) !== false;
        });
    }

    protected function getVisibleFields(string $cssClass, array $form): array
    {
        $targetedFields = $this->getFields($cssClass, ...$form['fields']);
        $currentPage = (int) (rgpost('gform_source_page_number_' . $form['id']) ?: 1);

        return array_filter($targetedFields, function (GF_Field $field) use ($form, $currentPage): bool {
            return $this->isVisible($field, $form, $currentPage);
        });
    }

    protected function check(GF_Field $sortCodeField, GF_Field $accountNumberField): Result
    {
        return $this->bankAccountValidator->getResult(
            rgpost("input_{$sortCodeField['id']}"),
            rgpost("input_{$accountNumberField['id']}")
        );
    }

    /**
     * Polyfill `array_key_first` for PHP 7.2.
     *
     * @param array $arr
     */
    private function arrayKeyFirst(array $arr)
    {
        if (function_exists('array_key_first')) {
            return array_key_first($arr);
        }

        foreach ($arr as $key => $_) {
            return $key;
        }

        return null;
    }

    abstract protected function shouldIntercept(Result $result): bool;

    abstract protected function markSortCodeFieldAsFailed(GF_Field $field): void;

    abstract protected function markAccountNumberFieldAsFailed(GF_Field $field): void;
}
