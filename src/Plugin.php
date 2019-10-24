<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification;

use Closure;
use GFAddOn;
use GFForms;
use Itineris\GFLoqateBankVerification\API\BankAccountValidator;
use Itineris\GFLoqateBankVerification\API\TransientCachedBankAccountValidator;

class Plugin
{
    public const VERSION = '0.5.0';

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
                esc_html__('Invalid account details.', 'gf-loqate-bank-verification'),
                BankAccountValidator::IS_CORRECT
            ),
            1000
        );

        add_filter(
            'gform_validation',
            static::makeValidationClosure(
                'gflbv-sort-code-direct-debit-capable',
                'gflbv-account-number-direct-debit-capable',
                esc_html__('Account is not direct debit capable.', 'gf-loqate-bank-verification'),
                BankAccountValidator::IS_DIRECT_DEBIT_CAPABLE
            ),
            500
        );
    }

    protected static function makeValidationClosure(
        string $sortCodeCssClass,
        string $accountNumberCssClass,
        string $validationMessage,
        string $predicate
    ): Closure {
        return function (array $validationResult) use (
            $sortCodeCssClass,
            $accountNumberCssClass,
            $validationMessage,
            $predicate
        ): array {
            $addOn = AddOn::get_instance();
            $key = (string) $addOn->get_plugin_setting(SettingsFields::SERVICE_KEY_NAME);

            // Early quit if no key defined.
            if ('' === $key) {
                return $validationResult;
            }

            $validator = new Validator(
                $sortCodeCssClass,
                $accountNumberCssClass,
                $validationMessage,
                new TransientCachedBankAccountValidator($key, $predicate)
            );

            return $validator->validate($validationResult);
        };
    }
}
