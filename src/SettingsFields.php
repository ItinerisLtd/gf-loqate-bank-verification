<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification;

use Itineris\GFLoqateBankVerification\API\APIKeyValidator;
use Itineris\GFLoqateBankVerification\API\TransientCachedBankAccountValidator;

class SettingsFields
{
    public const SERVICE_KEY_NAME = 'loqate_bank_verification_service_key';

    public static function toArray(): array
    {
        return [
            [
                'title' => esc_html__('GF Loqate Bank Verification', 'gf-loqate-bank-verification'),
                'fields' => [
                    [
                        'name' => static::SERVICE_KEY_NAME,
                        'label' => esc_html__('Service Key', 'gf-loqate-bank-verification'),
                        'type' => 'text',
                        'input_type' => 'password',
                        'feedback_callback' => function ($value): bool {
                            if (! is_string($value) || '' === $value) {
                                return false;
                            }

                            $validator = new APIKeyValidator();
                            return $validator->isValid($value);
                        },
                        'class' => 'medium',
                        'validation_callback' => function () {
                            TransientPurger::purge(TransientCachedBankAccountValidator::TRANSIENT_KEY_PREFIX);
                        },
                    ],
                ],
            ],
        ];
    }
}
