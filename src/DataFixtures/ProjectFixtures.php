<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    private const PROJECTS = [
        [
            'title' => 'Archives Bordeaux Métropole',
            'description' => 'Refonte du site des Archives de Bordeaux Métropole dans le cadre de ma formation de développeur web full stack.',
            'image' => '5f19aa4834fbc754781368.png',
            'url' => 'https://nighter33.github.io/Archives-Bordeaux-Metropole/',
            'isVideo' => false,
            'isWebsite' => true,
        ],
        [
            'title' => 'Hacocktail',
            'description' => 'Générateur de cocktail aléatoire et quizz sur les cocktails du monde. Réalisé dans le cadre de ma formation, hackathon.',
            'image' => '5f19abd694257690748000.png',
            'url' => null,
            'isVideo' => false,
            'isWebsite' => false,
        ],
        [
            'title' => 'Joshua',
            'description' => 'Joshua est un site où est organisé des compétitions de capture de drapeau. Réalisé dans le cadre de ma formation.',
            'image' => '5f19b1d861d44852003734.png',
            'url' => null,
            'isVideo' => false,
            'isWebsite' => false,
        ],
        [
            'title' => 'Loopy',
            'description' => 'Loopy est un outil permettant de rendre les enfants atteint de diabète insulino dépendant acteur de leur santé et ceci d\'une façon ludique. Hackathon Européen.',
            'image' => '5f19b457290c5270814508.png',
            'url' => 'https://www.youtube.com/watch?v=xvNe82WsPzk',
            'isVideo' => true,
            'isWebsite' => false,
        ],
        [
            'title' => 'JobTech',
            'description' => 'Plateforme de recrutement permettant la mise en relation entre candidats et entreprises. Réalisé dans le cadre de ma formation, projet client.',
            'image' => '5f19b5e2ae898398138394.png',
            'url' => 'https://bordeaux-php-202003-project-jobtech.phprover.wilders.dev/',
            'isVideo' => false,
            'isWebsite' => true,
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECTS as $project) {
            $newProject = new Project();
            $newProject
                ->setTitle($project['title'])
                ->setDescription($project['description'])
                ->setImage($project['image'])
                ->setUrl($project['url'])
                ->setIsVideo($project['isVideo'])
                ->setIsWebsite($project['isWebsite']);

            $manager->persist($newProject);
        }

        $manager->flush();
    }
}
