<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
class PaypalController extends Controller
{
    private $apiContext;

    public function __construct(ApiContext $apiContext)
    {
        parent::__construct();
        $this->apiContext = $apiContext;
    }

    public function createPayment(Request $request)
    {
        $memberId = $this->memberObj['id'];
        $groupData = GroupMember::with('group_data')->find($memberId);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($groupData->group_data->group_amount);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($groupData->group_data->group_name.' Group Member Payment');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success'))
            ->setCancelUrl(route('paypal.cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (\Exception $ex) {
            return redirect()->route('paypal.cancel');
        }
    }

    public function executePayment(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            if ($result->getState() == 'approved') {
                return redirect()->route('home')->with('success', 'Payment successful!');
            }
        } catch (\Exception $ex) {
            return redirect()->route('home')->with('error', 'Payment failed!');
        }

        return redirect()->route('home')->with('error', 'Payment failed!');
    }

    public function cancelPayment()
    {
        return redirect()->route('home')->with('error', 'Payment canceled!');
    }
}
