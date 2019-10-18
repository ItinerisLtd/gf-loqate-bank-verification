<?php

declare(strict_types=1);

namespace Itineris\GFLoqateBankVerification\API;

class Result
{
    /** @var array */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function isCorrect(): bool
    {
        return true === $this->get('IsCorrect');
    }

    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    public function isDirectDebitCapable(): bool
    {
        return true === $this->get('IsDirectDebitCapable');
    }

    public function isUnknownSortCode(): bool
    {
        return 'UnknownSortCode' === $this->get('StatusInformation');
    }

    public function isInvalidAccountNumber(): bool
    {
        return 'InvalidAccountNumber' === $this->get('StatusInformation');
    }

    public function getCause(): string
    {
        return (string) $this->get('Cause');
    }

    public function getResolution(): string
    {
        return (string) $this->get('Resolution');
    }
}
