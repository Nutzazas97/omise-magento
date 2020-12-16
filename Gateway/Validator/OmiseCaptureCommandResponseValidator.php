<?php
namespace Omise\Payment\Gateway\Validator;

use Omise\Payment\Gateway\Validator\CommandResponseValidator;
use Omise\Payment\Gateway\Validator\Message\Invalid as ErrorInvalid;
use Omise\Payment\Model\Api\Charge;

class OmiseCaptureCommandResponseValidator extends CommandResponseValidator
{
    /**
     * @param  \Omise\Payment\Model\Api\Charge $charge
     *
     * @return true|\Omise\Payment\Gateway\Validator\Message\*
     */
    protected function validateResponse(Charge $charge)
    {
        if ($charge->isFailed()) {
            return new ErrorInvalid($charge->failure_code);
        }

        return $charge->isSuccessful() ? true : (
            new ErrorInvalid(
                'Payment failed, invalid payment status,
                please contact our support if you have any questions'
            )
        );
    }
}
