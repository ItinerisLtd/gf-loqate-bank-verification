<?php
declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\API;

class APIKeyValidator
{
    protected const ENDPOINT = 'https://api.addressy.com/BankAccountValidation/Interactive/Validate/v2.00/json3.ws';
    protected const VALID_SORT_CODE = '00-00-99';
    protected const VALID_ACCOUNT_NUMBER = '12345678';
    protected const PREDICATE = 'IsCorrect';

    public function isValid(string $key): bool
    {
        $response = $this->fetchResponse($key);

        return $this->is200($response)
            && $this->getResult($response);
    }

    /**
     * @param string $key
     *
     * @return array|\WP_Error
     */
    protected function fetchResponse(string $key)
    {
        $url = add_query_arg([
            'Key' => urlencode($key),
            'SortCode' => urlencode(static::VALID_SORT_CODE),
            'AccountNumber' => urlencode(static::VALID_ACCOUNT_NUMBER),
        ], static::ENDPOINT);

        return wp_remote_get($url);
    }

    protected function is200($response): bool
    {
        return 200 === wp_remote_retrieve_response_code($response);
    }

    protected function getResult(array $response): bool
    {
        $result = $this->getData($response);

        return (bool) ($result[static::PREDICATE] ?? false);
    }

    protected function getData(array $response): array
    {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true) ?: [];
        $items = $data['Items'] ?? [];

        return is_array($items[0]) ? $items[0] : [];
    }
}
