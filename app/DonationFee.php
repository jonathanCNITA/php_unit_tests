<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


class DonationFee
{

    private $donation;
    private $commissionPercentage;
    private const FIXED_FEE = 50; 

    public function __construct($donation, $commissionPercentage)
    {
        if ($commissionPercentage > 30 || $commissionPercentage < 0) {
            throw new \Exception("commission Percentage out of bound :min 0, max 30!");
        }

        if ($donation < 100) {
            throw new \Exception("Donation is to low : min 100");
        }

        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;
    }

    public function getCommissionAmount()
    {
        return abs(($this->donation * $this->commissionPercentage) / 100);
    }

    public function getAmountCollected()
    {
        return $this->donation - $this->​getFixedAndCommissionFeeAmount();
    }

    public function ​getFixedAndCommissionFeeAmount()
    {
        $fixedAndCommission = $this->getCommissionAmount() + self::FIXED_FEE;
        if($fixedAndCommission > 500) {
            return 500;
        }
        return $fixedAndCommission;
        
    }

    public function ​getSummary()
    {
        return array(
            "​donation"=>$this->donation, 
            "​fixedFee"=>self::FIXED_FEE, 
            "​commission"=>$this->commissionPercentage, 
            "fixedAndCommission"=>$this->​getFixedAndCommissionFeeAmount(), 
            "​amountCollected"=>$this->getAmountCollected()
        );
    }
}