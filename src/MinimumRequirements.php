<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification;

class MinimumRequirements
{
    public const GRAVITY_FORMS_VERSION = '2.4.14.4';

    public static function toArray(): array
    {
        return [
            'wordpress' => [
                'version' => '4.9.10',
            ],
            'php' => [
                'version' => '7.2',
            ],
        ];
    }
}
