<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture
{
    private const EMAIL = 'erpeldinger.g@gmail.com';
    private const ROLES = ["ROLE_ADMIN"];
    private const PASSWORD = 'password';

    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {

        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();
        $admin
            ->setEmail(self::EMAIL)
            ->setRoles(self::ROLES)
            ->setPassword($this->passwordEncoder->encodePassword($admin, self::PASSWORD));

        $manager->persist($admin);
        $manager->flush();
    }
}
