<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $futureDate = new \DateTimeImmutable('now');
        $futureDate = $futureDate->modify(rand(0, 4) . ' week');

        $futureTime = $futureDate->modify(rand(0, 4) . ' day');

        for ($i = 0; $i <= 30; $i++){
            $event = new Event();
            $event
                ->setAddress($this->faker->address())
                ->setStreetNumber($this->faker->buildingNumber())
                ->setCity($this->faker->city())
                ->setState($this->faker->numberBetween(0, count(Event::STATE_ARRAY) - 1))
                ->setPostcode($this->faker->randomNumber(2, false))
                ->setEventName($this->faker->words(5, true))
                ->setGuestsNumber($this->faker->randomNumber(3, false))
                ->setAdvanceTime($this->faker->numberBetween(0, count(Event::ADVANCED_TIME_ARRAY) - 1))
                ->setEventDate($futureDate)
                ->setAvailableTimeForEvent(rand(0, 4))
                ->setEventTime($futureTime)
                ->setEventType($this->faker->numberBetween(0, count(Event::EVENT_TYPE_ARRAY) - 1))
                ->setEventKind($this->faker->numberBetween(0, count(Event::EVENT_KIND_ARRAY) - 1))
                ->setLactoseIntolerant($this->faker->numberBetween(0, 1))
                ->setNearbyPowerSupply($this->faker->numberBetween(0, 1))
                ->setShortWalkingDistance($this->faker->numberBetween(0, 1));

            $manager->persist($event);
        }

        $manager->flush();
    }
}
