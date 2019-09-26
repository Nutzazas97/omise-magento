define(
    [
        'ko',
        'Omise_Payment/js/view/payment/omise-offline-method-renderer',
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/model/full-screen-loader',
        'Magento_Checkout/js/action/redirect-on-success',
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/error-processor'
    ],
    function (
        ko,
        Base,
        Component,
        fullScreenLoader,
        redirectOnSuccessAction,
        quote
    ) {
        'use strict';

        return Component.extend(Base).extend({
            defaults: {
                template: 'Omise_Payment/payment/offline-tesco-form'
            },

            isPlaceOrderActionAllowed: ko.observable(quote.billingAddress() != null),

            code: 'omise_offline_tesco',

            /**
             * Hook the placeOrder function.
             * Original source: placeOrder(data, event); @ module-checkout/view/frontend/web/js/view/payment/default.js
             *
             * @return {boolean}
             */
            placeOrder: function(data, event) {
                var self = this;
                var failHandler = this.buildFailHandler(self);

                if (event) {
                    event.preventDefault();
                }

                self.getPlaceOrderDeferredObject()
                    .fail(failHandler)
                    .done(function() {
                        redirectOnSuccessAction.execute();
                    });

                return true;
            }
        });
    }
);
