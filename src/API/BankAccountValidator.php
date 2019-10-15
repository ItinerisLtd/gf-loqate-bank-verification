<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\API;

class BankAccountValidator
{
    protected const ENDPOINT = 'https://api.addressy.com/BankAccountValidation/Interactive/Validate/v2.00/json3.ws';

    /** @var string */
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getResult(string $sortCode, string $accountNumber): Result
    {
        $response = $this->fetchResponse($sortCode, $accountNumber);

        $data = $this->is200($response)
            ? $this->getData($response)
            : [];

        return new Result($data);
    }

    protected function fetchResponse(string $sortCode, string $accountNumber)
    {
        $url = add_query_arg([
            'Key' => rawurlencode($this->key),
            'SortCode' => rawurlencode($sortCode),
            'AccountNumber' => rawurlencode($accountNumber),
        ], static::ENDPOINT);

        return wp_remote_get($url);
    }

    protected function is200($response): bool
    {
        return 200 === wp_remote_retrieve_response_code($response);
    }

    protected function getData(array $response): array
    {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true) ?: [];
        $items = $data['Items'] ?? [];

        return is_array($items[0]) ? $items[0] : [];
    }
}
