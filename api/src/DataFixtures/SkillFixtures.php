<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    private const SKILLS = [
        'Git' => '5f7d0175d034d_git.png',
        'Html 5' => '5f7d01b9330f7_html5.png',
        'Css 3' => '5f7d01c6a65e5_css3.png',
        'Php' => '5f7d0194b316c_php.png',
        'JavaScript' => '5f7d01e8744c3_javascript.png',
        'Scrum' => '5f7d01fd9177d_scrum.png',
        'MySQL' => '5f7d020a11cc8_mysql.png',
        'Bootstrap' => '5f7d0121e0a0e_bootstrap.png',
        'Sass' => '5f7d01d33d6a2_sass.png',
        'Télétravail' => '5f7d01f4e4dca_teletravail.png',
        'Symfony' => '5f7d02165f373_symfony.png',
        'Doctrine' => '5f7d01a155c2d_doctrine.png',
        'Twig' => '5f7d01dce3a99_twig.png',
        'React' => '5f7d01aca6181_react.png',
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
