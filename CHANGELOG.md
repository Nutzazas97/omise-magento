# Change Log

## [1.9.0.5] 2016-01-05
- *`Fixed`* Check authorized and captured status before continue the charge action.
- *`Fixed`* Disable submit button action when user clicks submit.
- *`Updated`* Extends `Mage_Payment_Model_Method_Abstract` class instead of `Mage_Payment_Model_Method_Cc` in the payment method class.

## [1.9.0.4] 2015-11-16
- *`Added`* Added `OmiseMagento/[OmiseMagentoVersion]`, `Magento/[MagentoVersion]` into `OMISE_USER_AGENT_SUFFIX`.
- *`Updated`* Updated **omise-php** library from 2.3.1 to 2.4.0.
- *`Fixed`* Supported php version 5.2 - 5.3.
- *`Fixed`* Added autocomplete attribute into card number and security code fields of the checkout form.

## [1.9.0.3] 2015-08-09
- *`Updated`* Updated **omise-php** library from 2.2.0 to 2.3.1.
- *`Fixed`* Fix 'CamelCase' class name issue (CamelCaseName of class was not load in some host environment).

## [1.9.0.2] 2015-07-07
#### Versioning & Document
- *`Updated`* Updated README.md file
- *`Updated`* Changed version number in module's xml files from `0.0.0.1` to `1.9.0.2` to match Magento releases

#### Dashboard Page
- *`Improved`* jQuery from http to https

## [1.0.1] 2015-06-23
#### Dashboard Page
- *`Added`* Added link to Omise Dashboard [https://dashboard.omise.co](https://dashboard.omise.co) into Magento Omise Dashboard Page.
- *`Fixed`* Omise Email Account was not shown in dashboard page.

##### Dashboard Page: Transfer section
- *`Fixed`* Transfer box was not shown when that account doesn't have any transfer history.

## [1.0.0] 2015-06-15
- *`Added`* Implemented **Omise Dashboard** into Magento's admin page. The features are as follows:
  - Show current account status (live or test) depends on that you configured in *Omise Keys Setting page*.
  - Show total account balance, transferable balance.
  - Show history of transfers.
  - Admin was able to transfer their *Omise Balance* to their *Bank account*.
- *`Added`* Implemented **Omise Keys Setting page** into Magento's admin page.
- *`Added`* Added **Omise menu** into top bar menu of Magento's admin page.
- *`Added`* Added **Omise Payment Gateway Module Configuration** into Margento's admin page in payment method section.
- *`Added`* Implemented **Omise Charge API** with `Authorize` with/without `Capture` options.
- *`Added`* Added **Omise Checkout Form** into Magento's checkout page.
- *`Added`* Added [omise-php](https://github.com/omise/omise-php) library *(v2.2.0)* into this extension.
- *`Updated`* Updated **README.md**.

## [0.0.1] 2015-06-15
- Initial version.