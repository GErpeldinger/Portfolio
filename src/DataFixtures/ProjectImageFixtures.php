<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\ProjectImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectImageFixtures extends Fixture implements DependentFixtureInterface
{
    private const PROJECT_IMAGES = [
        'Index JobTech' => [
            'project' => 'project_6',
            'image' => '5f97f99659d99_Index.jpg',
            'isCover' => true
        ],
        'Index Suite JobTech' => [
            'project' => 'project_6',
            'image' => '5f981cfc533b8_Index_Suite.jpg',
            'isCover' => false
        ],
        'Inscription Candidat JobTech' => [
            'project' => 'project_6',
            'image' => '5f98027da3224_Inscription_Candidat.jpg',
            'isCover' => false
        ],
        'Loopy' => [
            'project' => 'project_4',
            'image' => '5f9d6c78bfd45_Loopy.jpg',
            'isCover' => true
        ],
        'Index Hacocktail' => [
            'project' => 'project_2',
            'image' => '5f9d70fc450dd_Hacocktail_Index.jpg',
            'isCover' => true
        ],
        'Quizz Selection Thème Hacocktail' => [
            'project' => 'project_2',
            'image' => '5f9d7109bb5c9_Hacocktail_Select_Quizz_Theme.jpg',
            'isCover' => false
        ],
        'Quizz Play Hacocktail' => [
            'project' => 'project_2',
            'image' => '5f9d75d417cf7_Hacocktail_Play_Quizz.jpg',
            'isCover' => false
        ],
        'Index Joshua' => [
            'project' => 'project_3',
            'image' => '5f9d7984a070b_Joshua_Index.jpg',
            'isCover' => true
        ],
        'Connexion Joshua' => [
            'project' => 'project_3',
            'image' => '5f9d7994cffb9_Joshua_Connection.jpg',
            'isCover' => false
        ],
        'Admin Dashboard Joshua' => [
            'project' => 'project_3',
            'image' => '5f9d79a8a9d4a_Joshua_Admin.jpg',
            'isCover' => false
        ],
        'Index Archives de Bdx Métropole' => [
            'project' => 'project_1',
            'image' => '5f9d7bab57a60_Archives_Index.jpg',
            'isCover' => true
        ],
        'Introduction Archives de Bdx Métropole' => [
            'project' => 'project_1',
            'image' => '5f9d7bb903275_Archives_Introduction.jpg',
            'isCover' => false
        ],
        'Gallerie Archives de Bdx Métropole' => [
            'project' => 'project_1',
            'image' => '5f9d7bc42dc3c_Archives_Gallery.jpg',
            'isCover' => false
        ],
        'Contact Archives de Bdx Métropole' => [
            'project' => 'project_1',
            'image' => '5f9d7bd39bab4_Archives_Contact.jpg',
            'isCover' => false
        ],
        'Partie Enfant Loopy' => [
            'project' => 'project_4',
            'image' => '5fa08f243c682_Loopy_Enfant.jpg',
            'isCover' => false
        ],
        'Partie Docteur Loopy' => [
            'project' => 'project_4',
            'image' => '5fa102b72bff2_Loopy_Docteur.jpg',
            'isCover' => false
        ]
    ];

    public function getDependencies(): array
    {
        return [ProjectFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECT_IMAGES as $name => $data) {
            /* @var Project $project */
            $project = $this->getReference($data['project']);

            $projectImage = new ProjectImage();
            $projectImage
                ->setName($name)
                ->setProject($project)
                ->setIsCover($data['isCover'])
                ->setImage($data['image']);

            $manager->persist($projectImage);
        }

        $manager->flush();
    }
}
