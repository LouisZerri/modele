<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Entity\Measurements;
use App\Entity\Men;
use App\Entity\Women;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");

        for($i = 0; $i < 15; $i++)
        {
            $country = new Country();
            $country->setName($faker->country);
            $manager->persist($country);
            $men = new Men();
            $men->setTitle("Monsieur")
                ->setFirstname($faker->firstNameMale)
                ->setLastname($faker->lastName)
                ->setDateOfBirth($faker->date('d-m-Y', 'now'))
                ->setPhoneNumber($faker->e164PhoneNumber)
                ->setEmail($faker->email)
                ->setStreet($faker->streetAddress)
                ->setZipCode($faker->postcode)
                ->setCity($faker->city)
                ->setNativeLanguage("Français")
                ->setSecondLanguage("Anglais")
                ->setSize($faker->numberBetween(165, 185))
                ->setChest($faker->numberBetween(75, 110))
                ->setHips($faker->numberBetween(82, 125))
                ->setWaistSize($faker->numberBetween(57, 104))
                ->setClothingSize($faker->numberBetween(35, 76))
                ->setShoes($faker->numberBetween(35, 45))
                ->setHairs($faker->randomElement(['Châtain', 'Brun', 'Blond', 'Roux']))
                ->setEyes($faker->randomElement(['Bleus', 'Marrons', 'Verts']))
                ->setTatoos((int) $faker->boolean)
                ->setPiercing((int) $faker->boolean);
                
            $manager->persist($men);

        }

        for($j = 0; $j < 15; $j++)
        {
            $country = new Country();
            $country->setName($faker->country);

            $manager->persist($country);

            $women = new Women();
            $women->setTitle('Madame')
                ->setFirstname($faker->firstNameFemale)
                ->setLastname($faker->lastName)
                ->setDateOfBirth($faker->date('d-m-Y', 'now'))
                ->setPhoneNumber($faker->e164PhoneNumber)
                ->setEmail($faker->email)
                ->setStreet($faker->streetAddress)
                ->setZipCode($faker->postcode)
                ->setCity($faker->city)
                ->setNativeLanguage("Français")
                ->setSecondLanguage("Anglais")
                ->setSize($faker->numberBetween(165, 185))
                ->setChest($faker->numberBetween(75, 110))
                ->setHips($faker->numberBetween(82, 125))
                ->setWaistSize($faker->numberBetween(57, 104))
                ->setClothingSize($faker->numberBetween(35, 76))
                ->setShoes($faker->numberBetween(35, 45))
                ->setHairs($faker->randomElement(['Châtain', 'Brun', 'Blond', 'Roux']))
                ->setEyes($faker->randomElement(['Bleus', 'Marrons', 'Verts']))
                ->setTatoos((int) $faker->boolean)
                ->setPiercing((int) $faker->boolean);
                
            $manager->persist($women);

        }

        for($k = 0; $k < 10; $k++)
        {
            $user = new User();
            $user->setTitle($faker->randomElement(['Madame', 'Monsieur', 'Mademoiselle']))
                ->setFirstname($faker->firstname)
                ->setLastname($faker->lastname)
                ->setEmail($faker->email)
                ->setPassword(password_hash("password", PASSWORD_BCRYPT))
                ->setRoles($faker->randomElement(['ROLE_ADMIN_GOLD', 'ROLE_ADMIN_SILVER', 'ROLE_ADMIN_BRONZE']));
                
            $manager->persist($user);
        }

        

        

        $manager->flush();
    }
}
