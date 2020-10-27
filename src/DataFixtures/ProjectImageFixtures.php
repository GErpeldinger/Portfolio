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
            'project' => 'project_1',
            'image' => '5f97f99659d99_Index.jpg',
            'isCover' => true
        ],
        'Index Suite JobTech' => [
            'project' => 'project_1',
            'image' => '5f981cfc533b8_Index_Suite.jpg',
            'isCover' => false
        ],
        'Inscription Candidat JobTech' => [
            'project' => 'project_1',
            'image' => '5f98027da3224_Inscription_Candidat.jpg',
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
