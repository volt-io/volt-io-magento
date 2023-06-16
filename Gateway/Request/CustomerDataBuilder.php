<?php

declare(strict_types=1);

namespace Volt\Payment\Gateway\Request;

use Magento\Payment\Gateway\Request\BuilderInterface;
use Volt\Payment\Gateway\SubjectReader;

class CustomerDataBuilder implements BuilderInterface
{
    /**
     * The payer’s details.
     */
    public const PAYER = 'payer';

    /**
     * This should uniquely identify a payer in your system,
     * and must be between three and 36 characters using numbers and letters only.
     * Required.
     */
    public const REFERENCE = 'reference';

    /**
     * A valid email address for the payer, up to 255 characters.
     * Optional.
     */
    public const EMAIL = 'email';

    /**
     * The payer’s full name, up to 255 characters.
     * Optional.
     */
    public const NAME = 'name';

    /***
     * The payer’s IP address, in IPV4 format (xxx.xxx.xxx.xxx).
     * Optional.
     */
    public const IP = 'ip';

    /**
     * @var SubjectReader
     */
    private $subjectReader;

    public function __construct(
        SubjectReader $subjectReader
    ) {
        $this->subjectReader = $subjectReader;
    }

    public function build(array $buildSubject): array
    {
        $payment = $this->subjectReader->readPayment($buildSubject);

        $order = $payment->getOrder();
        $billingAddress = $order->getBillingAddress();

        $customerId = $billingAddress->getCustomerId()
            ?? 'G' . $this->subjectReader->readOrderIncrementId($buildSubject);

        return [
            self::PAYER => [
                self::REFERENCE => $customerId,
                self::EMAIL => $billingAddress->getEmail(),
                self::NAME => $billingAddress->getFirstname() . ' ' . $billingAddress->getLastname(),
            ],
        ];
    }
}
