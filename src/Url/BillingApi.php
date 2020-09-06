<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Url;

final class BillingApi
{
    /**
     * @var string
     */
    private $billingApiUrl;

    /**
     * BillingUrl constructor.
     *
     * @param string $billingApiUrl
     */
    public function __construct(string $billingApiUrl)
    {
        $this->billingApiUrl = $billingApiUrl;
    }

    public function __toString(): string
    {
        return $this->billingApiUrl;
    }
}
