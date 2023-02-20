<?php

namespace App\DataFixtures;

use App\Entity\Flavor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class FlavorFixtures extends Fixture
{
    private Generator $faker;

    private const FLAVORS_ARRAY = array(
        'Fraise',
        'Framboise',
        'Chocolat',
        'Vanille',
        'Lime & Gingembre',
        'Melon & Menthe',
        'Pistache',
        'Banana Split',
        'Myrtille',
        'Mûre',
        'Mangue',
        'Crème Chantilly',
        'Garnitures',
        'Bricelet maison'
    );



    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $count = count(self::FLAVORS_ARRAY);

        for ($i = 0; $i < $count; $i++){
            $flavor = new Flavor();
            $flavor
                ->setName(self::FLAVORS_ARRAY[$i])
                ->setPrice($this->faker->randomDigit())
                ->setStock(true)
                ->setTopping(false);
            $manager->persist($flavor);
        }

        $manager->flush();
    }
}
