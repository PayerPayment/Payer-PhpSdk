<?php namespace Payer\Sdk\Format;
/**
 * Copyright 2016 Payer Financial Services AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5.3
 *
 * @package   Payer_Sdk
 * @author    Payer <teknik@payer.se>
 * @copyright 2016 Payer Financial Services AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 */

use Payer\Sdk\Format\Order;

class Purchase extends DataFormatter
{

    /**
     * Handles the default 'Debit' object format
     *
     * @param array $debit The debit request object to be filtered
     * @return array The filtered debit object
     *
     */
    public function filterDebit(array $debit)
    {
        if (!array_key_exists("recurring_token", $debit)) {
            $debit['recurring_token'] = '';
        }

        if (!array_key_exists("merchant_reference_id", $debit)) {
            $debit['merchant_reference_id'] = '';
        }

        if (!array_key_exists("amount", $debit)) {
            $debit['amount'] = '';
        }

        if (!array_key_exists("currency", $debit)) {
            $debit['currency'] = '';
        }

        if (!array_key_exists("description", $debit)) {
            $debit['description'] = '';
        }

        if (!array_key_exists("vat_percentage", $debit)) {
            $debit['vat_percentage'] = '';
        }

        return $debit;
    }

    /**
     * Handles the default 'Purchase' object format
     *
     * @param array $purchase The purchase request object to be filtered
     * @return array The filtered purchase object
     *
     */
    public function filterPurchase(array $purchase)
    {
        $orderFormatter = new Order;

        $purchase['order'] = $orderFormatter->filterOrder($purchase['order']);
        $purchase['payment'] = $this->filterPayment($purchase['payment']);

        return $purchase;
    }

    /**
     * Handles the default 'Payment' object format
     *
     * @param array $payment The payment request object to be filtered
     * @return array The filtered payment object
     *
     */
    public function filterPayment(array $payment) {

        if (!array_key_exists("language", $payment)) {
            $payment['language'] = '';
        }

        if (!array_key_exists("message", $payment)) {
            $payment['message'] = '';
        }

        if (!array_key_exists("method", $payment)) {
            $payment['method'] = '';
        }

        if (!array_key_exists("url", $payment)) {
            $payment['url'] = array();
        }

        if (!array_key_exists("authorize", $payment['url'])) {
            $payment['url']['authorize'] = '';
        }

        if (!array_key_exists("redirect", $payment['url'])) {
            $payment['url']['redirect'] = '';
        }

        if (!array_key_exists("settle", $payment['url'])) {
            $payment['url']['settle'] = '';
        }

        if (!array_key_exists("success", $payment['url'])) {
            $payment['url']['success'] = '';
        }

        if (!array_key_exists("options", $payment)) {
            $payment['options'] = array();
        }

        if (!array_key_exists("store", $payment['options'])) {
            $payment['options']['store'] = false;
        }

        return $payment;
    }

    /**
     * Handles the default 'Callback Request' object format
     *
     * @param array $callbackRequest The callback request object to be filtered
     * @return array The filtered callback object
     *
     */
    public function filterCallbackRequest(array $callbackRequest) {
        if (!array_key_exists("proxy", $callbackRequest)) {
            $callbackRequest['proxy'] = array();
        }

        return $callbackRequest;
    }

}