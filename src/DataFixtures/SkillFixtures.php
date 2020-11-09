<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    private const SKILLS = [
        'Git' => '5fa947114fa32_git.png',
        'Html 5' => '5fa946cf8964f_html.png',
        'Css 3' => '5fa94701c14d9_css.png',
        'Php' => '5fa9472990037_php.png',
        'JavaScript' => '5fa9471b0e718_javascript.png',
        'Scrum' => '5fa9473f4c232_scrum.png',
        'MySQL' => '5fa94720afc90_mysql.png',
        'Bootstrap' => '5fa946fb7778f_bootstrap.png',
        'Scss' => '5fa9473963459_sass.png',
        'Télétravail' => '5fa9474c23419_teletravail.png',
        'Symfony' => '5fa947458cd7f_symfony.png',
        'Doctrine' => '5fa9470b23716_doctrine.png',
        'Twig' => '5fa947519ead3_twig.png',
        'React' => '5fa9472f728cf_react.png'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $name => $icon) {
            $skill = new Skill();
            $skill
                ->setName($name)
                ->setIcon($icon)
                ->setIsActive(true);

            $manager->persist($skill);
        }

        $manager->flush();
    }
}
