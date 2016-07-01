# Payer Php SDK

This composer package includes everything you need to get started with the integration to Payers secure payment services. Payer is supporting all popular payment methods such as card and mobile payment, invoice, installment, banking and much more.

For more information about our payment services, please visit [www.payer.se](https://www.payer.se).

## Requirements

  * [Apache](http://apache.org)
  * [PHP](http://php.org): Version 5.X.
  * [Curl](https://curl.haxx.se/): Version 7.10.X
  * [Composer](https://getcomposer.org)
  * [Payer Credentials](https://payer.se): Missing credentials? Please contact the customer service at [teknik@payer.se](mailto:teknik@payer.se)

## Examples

For integration examples, please see the `docs` directory in the package.

## Quickstart

  * Run `composer require payer/sdk` to install the package
  * Make the package available in your project by entering `require_once 'vendor/autoload.php'`
  * Now require each resource that you want to use. E.g. `use Payer\Sdk\Resource\*'`

## Running Test Cases

To be able to run the tests you've to setup your Payer Credentials in `tests/PayerTestCase.php`

## Support

For questions regarding your Payer SDK integration, please contact the Payer [Technican Support](mailto:teknik@payer.se).