<?php
namespace Omise\Payment\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class OfflinePaymentObserver implements ObserverInterface
{
    /**
     * @var \Omise\Payment\Helper\OmiseHelper
     */
    private $_helper;
    /**
     * @var \Omise\Payment\Model\Data\Email
     */
    private $_email;

    /**
     * @param \Omise\Payment\Helper\OmiseHelper $helper
     */
    public function __construct(
        \Omise\Payment\Helper\OmiseHelper $helper,
        \Omise\Payment\Model\Data\Email $email
    ) {
        $this->_helper           = $helper;
        $this->_email           = $email;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        $order   = $observer->getEvent()->getOrder();
        $paymentType = $order->getPayment()->getAdditionalInformation('payment_type');
        if ($this->_helper->isPayableByImageCode($paymentType)) {
            $this->_email->sendEmail($order);
        }
        return $this;
    }
}
