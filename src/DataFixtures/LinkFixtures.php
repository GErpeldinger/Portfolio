<?php

namespace App\DataFixtures;

use App\Entity\Link;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LinkFixtures extends Fixture
{
    private const LINKS = [
        Link::CONTACT['name']  => Link::CONTACT['url'],
        Link::LINKEDIN['name']  => Link::LINKEDIN['url'],
        Link::GITHUB['name']  => Link::GITHUB['url']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::LINKS as $name => $url) {
            $link = new Link();
            $link->setName($name)
                ->setUrl($url);

            $manager->persist($link);
        }

        $manager->flush();
    }
}
