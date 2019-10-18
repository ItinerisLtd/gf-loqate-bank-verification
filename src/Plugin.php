<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification;

use Closure;
use GFAddOn;
use GFForms;
use Itineris\GFLoqateBankVerification\API\TransientCachedBankAccountValidator;
use Itineris\GFLoqateBankVerification\Validators\AbstractValidator;
use Itineris\GFLoqateBankVerification\Validators\AccountNumberValidator;
use Itineris\GFLoqateBankVerification\Validators\DirectDebitCapableValidator;
use Itineris\GFLoqateBankVerification\Validators\IsCorrectValidator;
use Itineris\GFLoqateBankVerification\Validators\SortCodeValidator;

class Plugin
{
    public const VERSION = '0.4.0';

    public static function run(): void
    {
        // TODO: Check `GFForms` is loaded.
        GFForms::include_addon_framework();
        GFAddOn::register(AddOn::class);

        add_filter(
            'gform_validation',
            static::makeValidationClosure(
                'gflbv-sort-code-is-correct',
                'gflbv-account-number-is-correct',
                esc_html__('Invalid sort code details.', 'gf-loqate-bank-verification'),
                SortCodeValidator::class
            )
        );

        add_filter(
            'gform_validation',
            static::makeValidationClosure(
                'gflbv-sort-code-is-correct',
                'gflbv-account-number-is-correct',
                esc_html__('Invalid account number details.', 'gf-loqate-bank-verification'),
                AccountNumberValidator::class
            )
        );

        add_filter(
            'gform_validation',
            static::makeValidationClosure(
                'gflbv-sort-code-is-correct',
                'gflbv-account-number-is-correct',
                esc_html__('Invalid account number details.', 'gf-loqate-bank-verification'),
                IsCorrectValidator::class
            )
        );

        add_filter(
            'gform_validation',
            static::makeValidationClosure(
                'gflbv-sort-code-direct-debit-capable',
                'gflbv-account-number-direct-debit-capable',
                esc_html__('Account is not direct debit capable.', 'gf-loqate-bank-verification'),
                DirectDebitCapableValidator::class
            )
        );
    }

    protected static function makeValidationClosure(
        string $sortCodeCssClass,
        string $accountNumberCssClass,
        string $validationMessage,
        string $klass
    ): Closure {
        return function (array $validationResult) use (
            $sortCodeCssClass,
            $accountNumberCssClass,
            $validationMessage,
            $klass
        ): array {
            $addOn = AddOn::get_instance();
            $key = (string) $addOn->get_plugin_setting(SettingsFields::SERVICE_KEY_NAME);

            // Early quit if no key defined.
            if ('' === $key) {
                return $validationResult;
            }

            /** @var AbstractValidator $validator */
            $validator = new $klass(
                $sortCodeCssClass,
                $accountNumberCssClass,
                new TransientCachedBankAccountValidator($key),
                $validationMessage
            );

            return $validator->validate($validationResult);
        };
    }
}
