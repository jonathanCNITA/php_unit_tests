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

    /*
     *  Le pourcentage de commission doit être un être compris entre 0 et 30 %, 
     *  dans le cas contraire la class retournera une ​Exception
     */

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

    /*
     *  Le montant de la donation doit être un entier positif représentant 
     *  un montant en centimes d’euros, et doit être supérieur ou égale à 100 (1€) 
     *  dans le cas contraire la class retournera une ​Exception​ 
    */

    public function testPositiveDonation() 
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(80, 20);
    }

    public function testNegativeDonation() 
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(-800, 20);
    }
}
