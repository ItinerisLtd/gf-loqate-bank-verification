<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\API;

class BankAccountValidator
{
    public const IS_CORRECT = 'IsCorrect';
    public const IS_DIRECT_DEBIT_CAPABLE = 'IsDirectDebitCapable';

    protected const ENDPOINT = 'https://api.addressy.com/BankAccountValidation/Interactive/Validate/v2.00/json3.ws';

    /** @var string */
    protected $key;
    /** @var string */
    protected $predicate;

    public function __construct(string $key, string $predicate)
    {
        $this->key = $key;
        $this->predicate = $predicate;
    }

    public function isValid(string $sortCode, string $accountNumber): bool
    {
        $response = $this->fetchResponse($sortCode, $accountNumber);

        return $this->is200($response)
            && $this->getPredicateResult($response);
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

    protected function getPredicateResult(array $response): bool
    {
        $result = $this->getData($response);

        return (bool) ($result[$this->predicate] ?? false);
    }

    protected function getData(array $response): array
    {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true) ?: [];
        $items = $data['Items'] ?? [];

        return is_array($items[0]) ? $items[0] : [];
    }
}
