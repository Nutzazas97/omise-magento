<?php
namespace Omise\Payment\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;
use Magento\Quote\Api\Data\PaymentInterface;

class KonbiniDataAssignObserver extends AbstractDataAssignObserver
{
    /**
     * @var string
     */
    const PHONE_NUMBER  = 'konbini_phone_number';
    const EMAIL         = 'konbini_email';
    const CUSTOMER_NAME = 'konbini_customer_name';

    /**
     * @var array
     */
    protected $additionalInformationList = [
        self::PHONE_NUMBER,
        self::EMAIL,
        self::CUSTOMER_NAME
    ];

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(Observer $observer)
    {
        $dataObject = $this->readDataArgument($observer);

        $additionalData = $dataObject->getData(PaymentInterface::KEY_ADDITIONAL_DATA);

        if (! is_array($additionalData)) {
            return;
        }

        $paymentInfo = $this->readPaymentModelArgument($observer);

        foreach ($this->additionalInformationList as $additionalInformationKey) {
            if (isset($additionalData[$additionalInformationKey])) {
                $paymentInfo->setAdditionalInformation(
                    $additionalInformationKey,
                    $additionalData[$additionalInformationKey]
                );
            }
        }
    }
}
