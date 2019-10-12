<?php
declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\API;

class TransientCachedBankAccountValidator extends BankAccountValidator
{
    protected const TRANSIENT_KEY_PREFIX = 'gf-loqate-bank-verification';
    protected const TRANSIENT_TTL = 3600; // 1 hour in seconds.

    /**
     * @param string $sortCode
     * @param string $accountNumber
     *
     * @return array|\WP_Error
     */
    protected function fetchResponse(string $sortCode, string $accountNumber)
    {
        $transientKey = static::TRANSIENT_KEY_PREFIX . '_' . md5($sortCode . ';' . $accountNumber);
        $response = get_transient($transientKey);

        if (false === $response) {
            $response = parent::fetchResponse($sortCode, $accountNumber);

            if ($this->is200($response)) {
                set_transient($transientKey, $response, static::TRANSIENT_TTL);
            }
        }

        return $response;
    }
}
