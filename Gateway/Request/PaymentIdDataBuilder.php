<?php

declare(strict_types=1);

namespace Volt\Payment\Gateway\Request;

use Magento\Payment\Gateway\Request\BuilderInterface;

class PaymentIdDataBuilder implements BuilderInterface
{
    /**
     * Create a reference of up to 18 characters, using letters and numbers only
     * Each payment requires a unique reference and, to prevent duplicate payments,
     * we’ll automatically reject requests where you’ve used the reference before.
     */
    public const UNIQUE_REFERENCE = 'uniqueReference';

    /**
     * The maximum length of the reference is 18 characters
     */
    public const REFERENCE_LENGTH = 18;

    public function build(array $buildSubject): array
    {
        $reference = substr(md5(microtime()),rand(0, 26),self::REFERENCE_LENGTH);

        return [
            self::UNIQUE_REFERENCE => $reference,
        ];
    }
}
