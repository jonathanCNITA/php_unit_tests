<?php

namespace Tests\Unit;

use App\DonationFee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Mockery\Exception;

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
    
    }




    public function testGetAmountCollected()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);
        // Lorsque qu'on appel la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();
        // Alors la Valeur de la du montant collecté doit être de 90
        $expected = 90;
        $this->assertEquals($expected, $actual);


        // Etant donné une donation de 100 et commission de 20%
        $donationFees = new DonationFee(100, 20);
        // Lorsque qu'on appel la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();
        // Alors la Valeur de la du montant collecté doit être de 80
        $expected = 80;
        $this->assertEquals($expected, $actual);
    }


    public function testCommissionPercentValue()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(100, 50);
    }

    public function testCommissionNegativePercentValue()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(100, -10);
    }

    public function testCommissionPercentValueMessage()
    {
        $this->expectExceptionMessage("commission Percentage out of bound");
        $donationFees = new DonationFee(100, 50);
    }

}
