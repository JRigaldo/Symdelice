<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Estimate;

class EstimateFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $estimate = new Estimate();
        $estimate
            ->setBanana(5)
            ->setStrawberry(12)
            ->setRaspberry(12)
            ->setMango(12)
            ->setLime(10)
            ->setMelon(8)
            ->setGinger(2.5)
            ->setMint(2.5)
            ->setVanilla(10)
            ->setStrawberryCoulis(14)
            ->setRaspberryCoulis(14)
            ->setMangoCoulis(14)
            ->setChocolateTanzania(30)
            ->setMilk(2)
            ->setCream(7)
            ->setGruyereCream(18)
            ->setSugar(1)
            ->setCoconutCream(14)
            ->setOrganizationPricePerHour(30)
            ->setTimeOfPurchaseProducts(1)
            ->setTimePreparation(3)
            ->setTimeLoading(1)
            ->setTimeInstallation(0.5)
            ->setTimeStorage(0.5)
            ->setTimeWashingEquipment(1)
            ->setTimeToTidyTheRoom(1)
            ->setTimeForEmailExchange(1)
            ->setCarRental(100)
            ->setCarJourney(60)
            ->setMaterialPots(18)
            ->setMaterialSpoon(3.5)
            ->setMaterialTowel(5)
            ->setMaterialDisinfectant(13)
            ->setMaterialToc(2)
            ->setMaterialTshirt(5)
            ->setMaterialUtensil(10)
            ->setAmortizationOfStorage(10)
            ->setDepreciationOfMachines(50)
            ->setDepreciationOfStand(10)
            ->setSalaryEvent(80)
            ->setEventNumberOfIceroller(2)
            ->setEventNumberOfHours(3)
            ->setCompanyCosts(10)
            ->setNumberOfEmployees(2)
            ->setProfit(100);


        $manager->persist($estimate);

        $manager->flush();
    }
}
