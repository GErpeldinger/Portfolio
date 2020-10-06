<?php

namespace App\DataFixtures;

use App\Entity\Link;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LinkFixtures extends Fixture
{
    private const LINKS = [
        'linkedin' => 'https://www.linkedin.com/in/guillaumeerpeldinger/',
        'github' => 'https://github.com/Nighter33'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::LINKS as $name => $url) {
            $link = new Link();
            $link
                ->setName($name)
                ->setUrl($url);
            $manager->persist($link);
        }

        $manager->flush();
    }
}
