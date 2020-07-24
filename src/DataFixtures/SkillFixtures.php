<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    private const SKILLS = [
        'Git' => '5f1a246becd45400247493.png',
        'Html 5' => '5f1a23dea5ddc251674542.png',
        'Css 3' => '5f1a23e7ce2b5486177008.png',
        'Php' => '5f1a01df228fd879912778.png',
        'JavaScript' => '5f1a227a00ec5109670862.png',
        'Scrum' => '5f1a293c88243793289751.png',
        'MySQL' => '5f1a2701577cb698996103.png',
        'Bootstrap' => '5f1a27a3b63d5771868176.png',
        'Sass' => '5f1a24d0c8105574560636.png',
        'Télétravail' => '5f1a286c0b365964173665.png',
        'Symfony' => '5f19e43f80f8d900965944.png',
        'Doctrine' => '5f1a2a109b2bd666419740.png',
        'Twig' => '5f1a29c271c9c841656582.png',
        'React' => '5f1a22fcd4c0b333857650.png',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $name => $icon) {
            $skill = new Skill();
            $skill
                ->setName($name)
                ->setIcon($icon);

            $manager->persist($skill);
        }

        $manager->flush();
    }
}
