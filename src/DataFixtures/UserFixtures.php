<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;


class UserFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 10; $i++){
            $user = new User();
            $user
                ->setFullName($this->faker->name())
                ->setPseudo(mt_rand(0, 1) === 1 ? $this->faker->firstname() : null)
                ->setEmail($this->faker->email)
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password')
                ;

            $manager->persist($user);
        }

        $manager->flush();
    }
}
