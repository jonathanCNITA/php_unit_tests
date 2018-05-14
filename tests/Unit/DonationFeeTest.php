<?php

namespace Tests\Unit;

use App\DonationFee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationFeeTest extends TestCase
{
    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);
        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();
        // Alors la Valeur de la commission doit être de 10
        $expected = 10;
        $this->assertEquals($expected, $actual);


        // Etant donné une donation de 100 et commission de 20%
        $donationFees = new DonationFee(100, 20);
        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();
        // Alors la Valeur de la commission doit être de 20
        $expected = 20;
        $this->assertEquals($expected, $actual);


        // Etant donné une donation de 100 et commission de -30%
        $donationFees = new DonationFee(100, -30);
        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();
        // Alors la Valeur de la commission doit être de 30
        $expected = 30;
        $this->assertEquals($expected, $actual);


        // Etant donné une donation de 100 et commission de 100%
        $donationFees = new DonationFee(100, 100);
        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();
        // Alors la Valeur de la commission doit être de 100
        $expected = 100;
        $this->assertEquals($expected, $actual);


        // Etant donné une donation de 100 et commission de 0%
        $donationFees = new DonationFee(100, 0);
        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();
        // Alors la Valeur de la commission doit être de 100
        $expected = 0;
        $this->assertEquals($expected, $actual);


        // Etant donné une donation de 100 et commission de 170%
        $donationFees = new DonationFee(100, 170);
        // Lorsque qu'on appel la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();
        // Alors la Valeur de la commission doit être de 100
        $expected = 170;
        $this->assertEquals($expected, $actual);


    }
}
