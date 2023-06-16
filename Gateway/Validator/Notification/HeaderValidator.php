<?php

declare(strict_types=1);

namespace Volt\Payment\Gateway\Validator\Notification;

use Magento\Payment\Gateway\Validator\AbstractValidator;
use Magento\Payment\Gateway\Validator\ResultInterface;
use Magento\Payment\Gateway\Validator\ResultInterfaceFactory;
use Psr\Log\LoggerInterface;

class HeaderValidator extends AbstractValidator
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        ResultInterfaceFactory $resultFactory,
        LoggerInterface $logger
    ) {
        parent::__construct($resultFactory);
        $this->logger = $logger;
    }

    public function validate(array $validationSubject): ResultInterface
    {
        $this->logger->debug('HeaderValidator::validate', [
            'validationSubject' => $validationSubject,
        ]);

        return $this->createResult(true);
    }
}
