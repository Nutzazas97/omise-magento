<?php
namespace Omise\Payment\Gateway\Response;

use Magento\Payment\Gateway\Helper\SubjectReader;
use Magento\Payment\Gateway\Response\HandlerInterface;

class PendingInvoiceHandler implements HandlerInterface
{
    /**
     * @inheritdoc
     */
    public function handle(array $handlingSubject, array $response)
    {
        /** @var bool **/
        $captured = $response['data']['captured'] ? $response['data']['captured'] : $response['data']['paid'];

        if ($response['data']['status'] === 'pending'
            && $response['data']['authorized'] == false
            && $captured == false
            && $response['data']['authorize_uri']
        ) {
            /** @var \Magento\Payment\Gateway\Data\PaymentDataObjectInterface **/
            $payment = SubjectReader::readPayment($handlingSubject);

            $invoice = $payment->getPayment()->getOrder()->prepareInvoice();
            $invoice->register();

            $payment->getPayment()->getOrder()->addRelatedObject($invoice);
        }
    }
}
