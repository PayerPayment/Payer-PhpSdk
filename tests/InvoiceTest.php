<?php namespace Payer\Test;
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

use Payer\Sdk\Transport\Http\Response;

class InvoiceTest extends PayerTestCase {

    /**
     * Initializes the Payer Test Environment
     *
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Test invoice activation
     *
     * @return void
     *
     */
    public function testActivateInvoice()
    {
        print "testActivateInvoice()\n";

        $createInvoiceResponse = $this->stub->createDummyInvoice();

        $activateInvoiceResponse = Response::fromJson(
            $this->stub->invoice->activate($createInvoiceResponse)
        );
        print_r($activateInvoiceResponse);

        $this->assertTrue($activateInvoiceResponse['invoice_number'] > 0);
    }

    /**
     * Test fetch invoice status
     *
     * @return void
     *
     */
    public function testGetInvoiceStatusNew()
    {
        print "testGetInvoiceStatus()\n";

        $createInvoiceResponse = $this->stub->createDummyInvoice();

        $getInvoiceStatusResponse = Response::fromJson(
            $this->stub->invoice->getStatus($createInvoiceResponse)
        );
        print_r($getInvoiceStatusResponse);

        $this->assertTrue(!empty($getInvoiceStatusResponse));
    }

    /**
     * Test fetch available template entries and bind it to an non-activated invoice
     *
     * @return void
     *
     */
    public function testInvoiceTemplateEntryBinding()
    {
        print "testInvoiceTemplateEntryBinding()\n";

        $activeTemplateEntriesResponse = Response::fromJson(
            $this->stub->invoice->getActiveTemplateEntries()
        );
        print_r($activeTemplateEntriesResponse);

        $this->assertNotEmpty(
            $activeTemplateEntriesResponse,
            "There was no active template entries to fetch. Please create an entry in your Payer Web"
        );

        $createInvoiceResponse = $this->stub->createDummyInvoice();

        $bindingData = array(
            'invoice_number' => $createInvoiceResponse['invoice_number'],
            'entry_id'       => $activeTemplateEntriesResponse[0]['entry_id']
        );
        $bindingResponse = Response::fromJson(
            $this->stub->invoice->bindToTemplateEntry($bindingData)
        );
        print_r($bindingResponse);

        $this->assertTrue(
            !empty($bindingResponse['binding_id']) &&
            !empty($bindingResponse['invoice_number']) &&
            !empty($bindingResponse['entry_id'])
        );
    }

    /**
     * Test refund an invoice
     *
     * @return void
     *
     */
    public function testRefundInvoice()
    {
        print "testRefundInvoice()\n";

        $createActiveInvoiceResponse = $this->stub->createActivatedDummyInvoice();

        $invoiceStatusData = array(
            'invoice_number' => $createActiveInvoiceResponse['invoice_number']
        );
        $invoiceStatusResponse = Response::fromJson(
            $this->stub->invoice->getStatus($invoiceStatusData)
        );
        print_r($invoiceStatusResponse);

        $refundData = array(
            'transaction_id'    => $invoiceStatusResponse['transaction_id'],
            'reason'            => 'Refund from Payer Sdk TestCase',
            'amount'            => $invoiceStatusResponse['total_amount'],
            'vat_percentage'    => 25
        );
        $refundInvoiceResponse = Response::fromJson(
            $this->stub->invoice->refund($refundData)
        );
        print_r($refundInvoiceResponse);

        $this->assertTrue($refundInvoiceResponse['transaction_id'] > 0);
    }

    /**
     * Test send an invoice
     *
     * @return void
     *
     */
    public function testSendInvoice()
    {
        print "testSendInvoice()\n";

        $createActiveInvoiceResponse = $this->stub->createActivatedDummyInvoice();

        $sendInvoiceData = array(
            'invoice_number' => $createActiveInvoiceResponse['invoice_number'],
            'options' => array(
                'delivery_type' => 'print'
            )
        );

        $sendInvoiceResponse = Response::fromJson(
            $this->stub->invoice->send($sendInvoiceData)
        );
        print_r($sendInvoiceResponse);

        $this->assertTrue(!empty($sendInvoiceResponse));
    }

}