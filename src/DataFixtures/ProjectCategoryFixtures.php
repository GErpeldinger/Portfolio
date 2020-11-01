<?php

namespace App\DataFixtures;

use App\Entity\ProjectCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectCategoryFixtures extends Fixture
{
    private const PROJECT_CATEGORIES = [
        'Formation' => 'Projets réalisés pendant ma formation',
        'Personnel' => 'Projets personnels'
    ];

    public function load(ObjectManager $manager): void
    {
        $i = 1;
        foreach (self::PROJECT_CATEGORIES as $name => $title) {
            $projectCategory = new ProjectCategory();
            $projectCategory
                ->setName($name)
                ->setTitle($title);

            $this->addReference('project_category_' . $i, $projectCategory);
            $i++;

            $manager->persist($projectCategory);
        }

        $manager->flush();
    }
}
