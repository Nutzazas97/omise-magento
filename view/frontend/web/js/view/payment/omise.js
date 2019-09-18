define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';

        rendererList.push(
            {
                type: 'omise_cc',
                component: 'Omise_Payment/js/view/payment/method-renderer/omise-cc-method'
            }
        );

        rendererList.push(
            {
                type: 'omise_offsite_internetbanking',
                component: 'Omise_Payment/js/view/payment/method-renderer/omise-offsite-internetbanking-method'
            }
        );

        rendererList.push(
            {
                type: 'omise_offsite_alipay',
                component: 'Omise_Payment/js/view/payment/method-renderer/omise-offsite-alipay-method'
            }
        );

        rendererList.push(
            {
                type: 'omise_offsite_installment',
                component: 'Omise_Payment/js/view/payment/method-renderer/omise-offsite-installment-method'
            }
        );

        rendererList.push(
            {
                type: 'omise_offsite_truemoney',
                component: 'Omise_Payment/js/view/payment/method-renderer/omise-offsite-truemoney-method'
            }
        );

        rendererList.push(
            {
                type: 'omise_offline_tesco',
                component: 'Omise_Payment/js/view/payment/method-renderer/omise-offline-tesco-method'
            }
        );

        rendererList.push(
            {
                type: 'omise_offsite_conveniencestore',
                component: 'Omise_Payment/js/view/payment/method-renderer/omise-offsite-conveniencestore-method'
            }
        );

        return Component.extend({});
    }
);
