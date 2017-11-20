<?php
namespace Ebanx\Benjamin\Services\Gateways;

use Ebanx\Benjamin\Models\Country;
use Ebanx\Benjamin\Models\Currency;
use Ebanx\Benjamin\Models\Payment;
use Ebanx\Benjamin\Services\Adapters\BoletoPaymentAdapter;
use Ebanx\Benjamin\Services\Traits\Printable;

class Boleto extends DirectGateway
{
    use Printable;

    protected static function getEnabledCountries()
    {
        return array(Country::BRAZIL);
    }

    protected static function getEnabledCurrencies()
    {
        return array(
            Currency::BRL,
            Currency::USD,
            Currency::EUR
        );
    }

    /**
     * @return string
     */
    protected function getUrlFormat()
    {
        return "https://%s.ebanx.com/print/?hash=%s";
    }

    /**
     * @param Payment $payment
     * @return object
     */
    protected function getPaymentData(Payment $payment)
    {
        $payment->type = "boleto";

        $adapter = new BoletoPaymentAdapter($payment, $this->config);
        return $adapter->transform();
    }
}
