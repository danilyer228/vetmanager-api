<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Host;

final class BillingUrl
{
    /**
     * @var string
     */
    private $billingUrl;

    /**
     * BillingUrl constructor.
     * @param string $billingUrl
     */
    public function __construct(string $billingUrl)
    {
        $this->billingUrl = $billingUrl;
    }

    public function __toString(): string
    {
        return $this->billingUrl;
    }
}
